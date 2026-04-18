<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Site Settings
        \App\Models\SiteSetting::updateOrCreate(
            ['key' => 'ticker_news'],
            ['value' => 'Support Number: 03047244398 | Welcome to WPCS Wallet - Safe & Manual Deposits | Help & Support: 03047244398 | Withdrawals take 2-4 hours to process.']
        );

        // Payment Accounts for Deposits
        \App\Models\PaymentAccount::create([
            'type' => 'deposit',
            'provider' => 'EasyPaisa',
            'account_title' => 'WPCS SHOP',
            'account_number' => '03120000000',
        ]);

        \App\Models\PaymentAccount::create([
            'type' => 'deposit',
            'provider' => 'Meezan Bank',
            'account_title' => 'WPCS TECH',
            'account_number' => '010203040506',
        ]);

        // Payment Accounts for Withdrawals (Banks offered to users)
        \App\Models\PaymentAccount::create([
            'type' => 'withdraw',
            'provider' => 'EasyPaisa',
            'account_title' => 'System',
            'account_number' => 'N/A',
        ]);
        \App\Models\PaymentAccount::create([
            'type' => 'withdraw',
            'provider' => 'JazzCash',
            'account_title' => 'System',
            'account_number' => 'N/A',
        ]);
        \App\Models\PaymentAccount::create([
            'type' => 'withdraw',
            'provider' => 'HBL',
            'account_title' => 'System',
            'account_number' => 'N/A',
        ]);
    }
}
