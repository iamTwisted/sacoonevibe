<?php

namespace App\Services\Accounts;

use App\Models\Member;
use Illuminate\Support\Facades\Log;

class AccountService
{
    public function createDefaultAccounts(Member $member)
    {
        Log::info("Creating default accounts for member: {$member->id}");

        // This is a stub. In a real application, you would make an API call
        // to your accounts module here.
        //
        // Example:
        // Http::post(config('services.accounts.url') . '/api/accounts', [
        //     'member_id' => $member->id,
        //     'accounts' => [
        //         ['type' => 'savings', 'name' => 'Default Savings'],
        //         ['type' => 'shares', 'name' => 'Default Shares'],
        //     ]
        // ]);
    }
}
