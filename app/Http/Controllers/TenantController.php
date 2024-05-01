<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Tenant; // Assurez-vous d'avoir un modèle Tenant
use Illuminate\Support\Facades\Validator; // Utilisez cette classe à la place
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Dotunj\LaraTwilio\Facades\LaraTwilio;

use function Pest\Laravel\json;

class TenantController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $tenant = $this->create($request->all());
        Auth::login($tenant);
        return redirect()->route('index');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tenants'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $tenant = Tenant::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $tenant;
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('tenant')->attempt($credentials)) {
            return redirect()->route('profile');
        }

        return back()->withErrors(['email' => 'Les informations de connexion ne sont pas valides.']);
    }

    public function logout()
    {
        Auth::guard('tenant')->logout();
        return redirect()->route('index');
    }
    public function showDashboard()
    {
        $tenant = Auth::guard('tenant')->user();
        $contract = Contract::where('tenant_id', $tenant->id)->first();
        $rentPayments = Payment::where('tenant_id', $tenant->id)
            ->where('type_of_payment', 'loyer')
            ->get();
        $totalRentPayments = $rentPayments->sum('amount');
        $totalSecurityDeposit = $contract->security_deposit;
        return view('profile.dashboard', compact('tenant', 'contract', 'rentPayments', 'totalRentPayments', 'totalSecurityDeposit'));
    }

    public function showProfile()
    {
        $tenant = Auth::guard('tenant')->user()->name;
        $contract = $tenant->contract; // Suppose que le locataire a une relation avec le contrat
        return view('layouts.details-user', compact('tenant', 'contract'));
    }


    public function showEditForm()
    {
        $tenant = Auth::guard('tenant')->user();
        return view('profile.settings', compact('tenant'));
    }

    public function edit(Request $request)
    {
        $tenant = Auth::guard('tenant')->user();
        $tenant->update($request->all());
        return redirect()->route('profile');
    }

    public function rent()
    {
        $tenant = Auth::guard('tenant')->user();
        $contract = Contract::where('tenant_id', $tenant->id)->first();

        return view('profile.rent', compact('tenant', 'contract'));
    }

    public function paid()
    {
        $tenant = Auth::guard('tenant')->user();
        $contract = Contract::where('tenant_id', $tenant->id)->first();

        return view('profile.paid-rent', compact('tenant', 'contract'));
    }

    public function payRent(Request $request)
    {
        $tenant = Auth::guard('tenant')->user();
        $contract = Contract::where('tenant_id', $tenant->id)->first();

        $testmode = true;
        $url = $testmode ? "https://app.paydunya.com/sandbox-api/v1/checkout-invoice/create" :
        "https://app.paydunya.com/api/v1/checkout-invoice/create";
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'PAYDUNYA-MASTER-KEY' => config('paydunya.masterKey'),
            'PAYDUNYA-PRIVATE-KEY' => config('paydunya.privateKey'),
            'PAYDUNYA-TOKEN' => config('paydunya.token')
        ])->post($url, [
            'invoice' => [
                'items' => [
                    [
                        'name' => 'paiement ',
                        'quantity' => 1,
                        'unit_price' => $request->input('amount'),
                        'total_price' => $request->input('amount'),
                        'description' => 'Paiment de facture ',
                    ],
                ],
                'total_amount' => $request->input('amount'),
            ],
            'store' => [
                'name' => 'imo' // Assurez-vous que cette valeur est correctement définie.
            ],
            'custom_data' => [
                'month' => $request->input('month'),
                'tenant_id' => $tenant->id,
                'email'=> $tenant->email,
                'property_id'=> $contract->property->id,

            ],
            'actions' => [
                'cancel_url' => 'https://f38f-41-66-29-126.ngrok-free.app/cancel',
                "return_url" => 'https://f38f-41-66-29-126.ngrok-free.app/paydunya/webhook',
                "callback_url" => 'https://f38f-41-66-29-126.ngrok-free.app/verify-payment',
            ]
        ]);
        if ($response->successful()) {
            $responseData = json_decode($response->getBody(), true);

            // Enregistrer la réponse complète de l'API dans un fichier de log
            Log::info('Response from PayDunya API: ', [
                'status' => $response->status(),
                'headers' => $response->headers(),
                'body' => $responseData
            ]);
            // Rediriger l'utilisateur vers la page de paiement
            return redirect()->away($responseData['response_text']);
        } else {
            // En cas d'échec de la création de la facture, vous pouvez supprimer la transaction créée précédemment

            return response()->json([
                'success' => false,
                'error' => 'Failed to create checkout invoice',
                'status' => $response->status(),
                'message' => $response->body()
            ]);
        }

    }
    public function verifyPayment(Request $request)
    {
        Log::info('paydundy webhook data:', $request->all());

        file_put_contents(__DIR__.'/log.txt', json_encode($request->all(), JSON_PRETTY_PRINT));
        Log::info('Verify Payment Request', [
            'request_data' => $request->all(),
        ]);

        $data = $request->all();
        $month = $data['data']['custom_data']['month'];

        $tenant= $data['data']['custom_data']['tenant_id'];
        $montant = $data['data']['invoice']['total_amount'];

        $reference = $data['data']['invoice']['token'];

        $property= $data['data']['custom_data']['property_id'];

        $dateDay = Carbon::now();
        $datePaidThrough = $dateDay->addMonths($month); // Ajoute le nombre de mois à la date d'aujourd'hui
        $payment = new Payment([
            'property_id'=> $property,
            'tenant_id'=> $tenant,
            'type_of_payment'=> 'loyer',
            'amount'=>$montant,
            'payment_date'=>$dateDay,
            'reference'=> $reference,
            'due_date' => $datePaidThrough, // Utilise la date avec les mois ajoutés
            'status'=> 'completed',
            'slug'=> 'facture'. $property. $dateDay,
            'paid_through'=> $datePaidThrough, // Utilise la date avec les mois ajoutés
        ]);
        $payment->save();

        Log::info('Payment verified and contract updated', [
            'tenant_id' => $tenant,
        ]);
        // je voulais recuéoré la date de fin qui est dans le contract et d'ajouter le nmbre de mois d'avance que l'utilisateur a payer
            $contract = Contract::where('tenant_id', $tenant)->first();
            $contract->end_date = Carbon::parse($contract->end_date)->addMonths($month);
            $contract->save();

        // Vérifier si le paiement a été effectué avec succès
            Log::info('contract update',[
                'contract' => $contract,
            ]);
    }

    public function handlePaymentResponse(Request $request)
    {
        // Vérifier le hash de la réponse

        // Retourner une vue indiquant que le paiement a été effectué avec succès
        return json_encode(['status','payement succes']);
    }

    public function cancel(Request $request)
    {
        // Annuler le paiement et rediriger l'utilisateur vers la page d'accueil
        return json_encode(['status' => 'Payment cancelled']);
    }


    public function sendSms($to, $message)
    {
        return LaraTwilio::notify($to, $message);
    }



}
