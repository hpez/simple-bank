<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::factory()
            ->create([
                'id' => '1234567890',
                'user_id' => 1
            ]);
        Account::factory()
            ->create([
                'id' => '1234567891',
                'user_id' => 2
            ]);
        Account::factory()
            ->create([
                'id' => '1234567892',
                'user_id' => 3
            ]);
        Account::factory()
            ->create([
                'id' => '1234567893',
                'user_id' => 4
            ]);
        Account::factory()
            ->count(4)
            ->create();
    }
}
