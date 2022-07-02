<?php

namespace Database\Seeders;

use App\Models\CommissionCharge;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::factory()
            ->has(CommissionCharge::factory()->count(1))
            ->make([
                'from_card' => '5022291012345678',
                'to_card' => '5022291012345679'
            ]);
        Transaction::factory()
            ->has(CommissionCharge::factory()->count(1))
            ->make([
                'from_card' => '5022291012345679',
                'to_card' => '5022291012345678'
            ]);
    }
}
