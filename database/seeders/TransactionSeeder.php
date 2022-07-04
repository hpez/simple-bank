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
            ->count(20)
            ->has(CommissionCharge::factory()->count(1))
            ->create([
                'from_card' => '5022291075971836',
                'to_card' => '5022291012345672',
                'amount' => 1000
            ]);
        Transaction::factory()
            ->count(20)
            ->has(CommissionCharge::factory()->count(1))
            ->create([
                'from_card' => '5022291012345672',
                'to_card' => '5022291075971836',
                'amount' => 2000
            ]);
        Transaction::factory()
            ->count(5)
            ->has(CommissionCharge::factory()->count(1))
            ->create([
                'from_card' => '5022271212345672',
                'to_card' => '5022291075971836',
                'amount' => 2000
            ]);
        Transaction::factory()
            ->count(3)
            ->has(CommissionCharge::factory()->count(1))
            ->create([
                'from_card' => '5022271410345672',
                'to_card' => '5022291075971836',
                'amount' => 2000
            ]);
    }
}
