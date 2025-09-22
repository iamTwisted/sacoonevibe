<?php

namespace App\Services;

use App\Models\Member;
use App\Models\Account;
use App\Models\Product;

class AccountsService
{
    public function createDefaultAccounts(Member $member)
    {
        // Create Regular Savings Account
        Account::create([
            'member_id' => $member->id,
            'account_type' => 'regular_savings',
            'balance' => 0,
        ]);

        // Create Retirement Account if RBA product exists
        if (Product::where('slug', 'rba')->exists()) {
            Account::create([
                'member_id' => $member->id,
                'account_type' => 'retirement_account',
                'balance' => 0,
            ]);
        }

        // Create Shares Account
        Account::create([
            'member_id' => $member->id,
            'account_type' => 'shares_account',
            'balance' => 0,
        ]);
    }
}
