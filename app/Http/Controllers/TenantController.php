<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use App\Models\Tenant; // Assurez-vous d'avoir un modèle Tenant
use Illuminate\Support\Facades\Validator; // Utilisez cette classe à la place
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
        $contract = $tenant->contract; // Suppose que le locataire a une relation avec le contrat
        return view('profile.dashboard', compact('tenant', 'contract'));
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
                'user_id' => $tenant->name,
                'email'=> $tenant->email

            ],
            'actions' => [
                'cancel_url' => 'https://3a26-154-0-26-81.ngrok-free.app/cancel',
                "return_url" => 'https://3a26-154-0-26-81.ngrok-free.app/paydunya/webhook',
                "callback_url" => 'https://3a26-154-0-26-81.ngrok-free.app/verify-payment',
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
        Log::info('CinetPay webhook data:', $request->all());

        file_put_contents(__DIR__.'/log.txt', json_encode($request->all(), JSON_PRETTY_PRINT));
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








}
