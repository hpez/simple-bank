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
            ->make([
                'id' => '5022291012345678'
            ]);
        Card::factory()
            ->make([
                'id' => '5022291012345679'
            ]);
        Card::factory()
            ->make([
                'id' => '5022291012345673'
            ]);
    }
}
