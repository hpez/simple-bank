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
                'id' => '5022291075971836'
            ]);
        Card::factory()
            ->create([
                'id' => '5022291012345679'
            ]);
        Card::factory()
            ->create([
                'id' => '5022291012345673'
            ]);
    }
}
