<?php

namespace App\Console\Commands;

use App\Models\Contract;
use Carbon\Carbon;
use Dotunj\LaraTwilio\Facades\LaraTwilio;
use Illuminate\Console\Command;

class SendPaymentReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-payment-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $contracts = Contract::where('paid', false)->whereDate('end_date', '<', Carbon::today())->get();
        foreach ($contracts as $contract) {
            $tenant = $contract->tenant;
            $paymentLink = url('/payment/' . $contract->id);
            $message = 'Veuillez payer votre facture en cliquant sur ce lien : ' . $paymentLink;
            LaraTwilio::notify($tenant->phone, $message);
        }
    }
}
