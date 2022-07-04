<?php

namespace App\Listeners;

use App\Events\TransactionSaved;
use App\Models\CommissionCharge;
use App\Models\Transaction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GenerateCommissionTransaction
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\TransactionSaved  $event
     * @return void
     */
    public function handle(TransactionSaved $event)
    {
        $transaction = $event->transaction;
        $transaction->commissionCharge()->create([
            'amount' => env('COMMISSION_CHARGE_AMOUNT')
        ]);
        $transaction->fromCard->account->decrement('balance', env('COMMISSION_CHARGE_AMOUNT'));
    }
}
