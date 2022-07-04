<?php

namespace App\Listeners;

use App\Events\TransactionSaved;
use App\Models\CommissionCharge;
use App\Models\Transaction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GenerateCommissionTransaction
{
    private $transaction;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\TransactionSaved  $event
     * @return void
     */
    public function handle(TransactionSaved $event)
    {
        $this->transaction->commissionCharge()->create([
            'amount' => env('COMMISSION_CHARGE_AMOUNT')
        ]);
        $this->transaction->fromCard->account->user()->decrement(env('COMMISSION_CHARGE_AMOUNT'));
    }
}
