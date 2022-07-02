<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'balance'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}