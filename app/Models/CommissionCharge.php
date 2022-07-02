<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommissionCharge extends Model
{
    protected $fillable = [
        'transaction_id',
        'amount'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
