<?php

namespace Tests\Unit;

use App\Enums\TransactionTypeEnum;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic unit test for creating transactions.
     */
    public function test_create_transaction(): void
    {

        $user = User::factory()->create();


        Transaction::create([
            'description' => 'Test',
            'amount' => 100,
            'type' => TransactionTypeEnum::INCOME,
            'transaction_date' => now(),
            'user_id' => $user->id,
        ]);



        $this->assertDatabaseHas('transactions', [
            'description' => 'Test',
            'amount' => 100,
            'type' => TransactionTypeEnum::INCOME,
            'transaction_date' => now(),
            'user_id' => $user->id,
        ]);
    }
}
