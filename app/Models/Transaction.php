<?php

namespace App\Models;

use App\Events\TransactionSaved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_card',
        'to_card',
        'amount'
    ];


    protected $dispatchesEvents = [
        'created' => TransactionSaved::class
    ];

    public function fromCard()
    {
        return $this->belongsTo(Card::class, 'from_card');
    }

    public function toCard()
    {
        return $this->belongsTo(Card::class, 'to_card');
    }

    public function commissionCharge()
    {
        return $this->hasOne(CommissionCharge::class);
    }
}
