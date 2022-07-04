<?php

namespace App\Listeners;

use App\Events\TransactionSaved;
use App\Models\Card;
use App\Models\Transaction;
use App\Notifications\DepositMade;
use App\Notifications\WithdrawMade;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Queue\InteractsWithQueue;

class NotifyTransactionUsers
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

        $transaction->fromCard->account->user->notify(new WithdrawMade($transaction));

        try {
            $toCard = Card::findOrFail($transaction->to_card);
            $toCard->account->user->notify(new DepositMade($transaction));
        } catch (ModelNotFoundException) {}
    }
}
