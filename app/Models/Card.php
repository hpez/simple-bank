<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'id',
        'account_id'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
