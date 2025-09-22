<?php

namespace App\Listeners;

use App\Events\TransactionCreated;
use App\Models\RetirementContribution;

class CreateRetirementContribution
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\TransactionCreated  $event
     * @return void
     */
    public function handle(TransactionCreated $event)
    {
        $transaction = $event->transaction;

        if ($transaction->type === 'retirement_contribution' && isset($transaction->meta['rba_export']) && $transaction->meta['rba_export'] === true) {
            RetirementContribution::create([
                'member_id' => $transaction->member_id,
                'contribution_date' => $transaction->created_at->toDateString(),
                'employer_contribution' => $transaction->meta['employer_contribution'] ?? 0,
                'contribution_amount' => $transaction->amount,
                'interest_accrued' => $transaction->meta['interest_accrued'] ?? 0,
            ]);
        }
    }
}
