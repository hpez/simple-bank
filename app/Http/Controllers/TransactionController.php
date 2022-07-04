<?php

namespace App\Http\Controllers;

use App\Helpers\Number;
use App\Models\Transaction;
use App\Rules\Card;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'from_card' => ['required', 'string', new Card],
            'to_card' => ['required', 'string', new Card],
            'amount' => ['required', 'integer', 'min:1000', 'max:50000000']
        ]);

        $data['from_card'] = Number::convert($data['from_card']);
        $data['to_card'] = Number::convert($data['to_card']);

        try {
            $fromCard = \App\Models\Card::findOrFail($data['from_card']);
        } catch (ModelNotFoundException) {
            return  response()->json(['error' => 'from_card not found'], 404);
        }

        if ($fromCard->account->balance < $data['amount'])
            return response()->json(['error' => 'Insufficient funds'], 406);

        $fromCard->account->decrement('balance', $data['amount']);
        $transaction = Transaction::create($data);

        return response()->json($transaction, 201);
    }
}
