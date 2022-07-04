<?php

namespace Tests\Feature;

use App\Models\Card;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function testTransactionStore()
    {
        $response = $this->postJson('/api/transaction', [
            'from_card' => '1234123412341234',
            'to_card' => '5022291075971836',
            'amount' => '1000'
        ]);

        $response->assertStatus(422);

        $response = $this->postJson('/api/transaction', [
            'from_card' => '5022291075971836',
            'to_card' => '1234123412341234',
            'amount' => '1000'
        ]);

        $response->assertStatus(422);

        $response = $this->postJson('/api/transaction', [
            'from_card' => '5022291075971836',
            'to_card' => '5859831137116637',
            'amount' => '50'
        ]);

        $response->assertStatus(422);

        $response = $this->postJson('/api/transaction', [
            'from_card' => '5022291075971836',
            'to_card' => '5859831137116637',
            'amount' => '100000000'
        ]);

        $response->assertStatus(422);

        $cardNo = '5022291075971836';
        $beforeBalance = Card::find($cardNo)->account->balance;
        $response = $this->postJson('/api/transaction', [
            'from_card' => $cardNo,
            'to_card' => '5859831137116637',
            'amount' => '1000'
        ]);

        $response->assertStatus(201);

        $afterBalance = Card::find($cardNo)->account->balance;
        $this->assertEquals(1000 + env('COMMISSION_CHARGE_AMOUNT'), $beforeBalance - $afterBalance);
    }
}
