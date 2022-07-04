<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Card::factory()
            ->create([
                'id' => '5022291075971836',
                'account_id' => '1234567890',
            ]);
        Card::factory()
            ->create([
                'id' => '5022291012345672',
                'account_id' => '1234567891',
            ]);
        Card::factory()
            ->create([
                'id' => '5022271212345672',
                'account_id' => '1234567892',
            ]);
        Card::factory()
            ->create([
                'id' => '5022271410345672',
                'account_id' => '1234567893',
            ]);
    }
}
