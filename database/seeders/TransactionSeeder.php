<?php

namespace Database\Seeders;

use App\Models\CommissionCharge;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::factory()
            ->has(CommissionCharge::factory()->count(1))
            ->create([
                'from_card' => '5022291075971836',
                'to_card' => '5022291012345679',
                'amount' => 1000
            ]);
        Transaction::factory()
            ->has(CommissionCharge::factory()->count(1))
            ->create([
                'from_card' => '5022291075971836',
                'to_card' => '5022291012345678',
                'amount' => 2000
            ]);
    }
}
