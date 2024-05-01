<?php

namespace App\Console\Commands;

use App\Models\Contract;
use App\Models\Tenant;
use Carbon\Carbon;
use Dotunj\LaraTwilio\Facades\LaraTwilio;
use Illuminate\Console\Command;

class SendSms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-sms';

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
        if (Carbon::today()->day == 1) {
            $contracts = Contract::whereMonth('end_date', Carbon::today()->subMonth()->month)->get();
            foreach ($contracts as $contract) {
                $tenant = $contract->tenant;
                LaraTwilio::notify($tenant->phone, 'Il est temps de payer votre facture.');
            }
        }
    }
}
