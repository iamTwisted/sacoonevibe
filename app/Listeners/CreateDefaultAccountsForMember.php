<?php

namespace App\Listeners;

use App\Events\MemberApproved;
use App\Services\AccountsService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateDefaultAccountsForMember implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct(private AccountsService $accountsService)
    {
    }

    /**
     * Handle the event.
     */
    public function handle(MemberApproved $event): void
    {
        if ($event->member->accounts()->count() > 0) {
            return;
        }

        $this->accountsService->createDefaultAccounts($event->member);
    }
}
