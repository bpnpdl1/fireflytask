<?php

namespace Tests\Feature;

use App\Enums\TransactionTypeEnum;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test for create method in TransactionController.
     */
    public function test_create_transaction(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('transaction.store'), [
            'description' => 'Test Transaction',
            'amount' => 150,
            'type' => TransactionTypeEnum::INCOME->value,
            'transaction_date' => now()->toDateString(),
        ]);

        $response->assertRedirect(route('transaction.index'));

        $this->assertDatabaseHas('transactions', [
            'description' => 'Test Transaction',
            'amount' => 150,
            'type' => TransactionTypeEnum::INCOME->value,
            'user_id' => $user->id,
        ]);
    }

    public function test_update_transaction(): void
    {
        $user = User::factory()->create();

        $transaction = Transaction::factory()->create([
            'user_id' => $user->id,
            'description' => 'Purchased Goods',
            'amount' => 100,
            'type' => TransactionTypeEnum::INCOME->value,
            'transaction_date' => now(),
        ]);

        $response = $this->actingAs($user)->put(route('transaction.update', $transaction), [
            'description' => 'Purchased Goods',
            'amount' => 300,
            'type' => TransactionTypeEnum::EXPENSE->value,
            'transaction_date' => now()->toDateString(),
        ]);

        $response->assertRedirect(route('transaction.index'));

        $this->assertDatabaseHas('transactions', [
            'id' => $transaction->id,
            'description' => 'Purchased Goods',
            'amount' => 300,
            'type' => TransactionTypeEnum::EXPENSE->value,
            'user_id' => $user->id,
        ]);
    }

    public function test_delete_transaction(): void
    {
        // Create a user and transaction owned by that user
        $user = User::factory()->create();
        $transaction = Transaction::factory()->create(['user_id' => $user->id]);

        // Ensure transaction exists in database before deletion
        $this->assertDatabaseHas('transactions', ['id' => $transaction->id]);

        // Send delete request while authenticated as the user
        $response = $this->actingAs($user)->delete(route('transaction.destroy', $transaction->id));

        // Assert proper redirect after successful deletion
        $response->assertRedirect(route('transaction.index'));
        $response->assertSessionHas('success', 'Transaction deleted successfully.');

        // Assert transaction is removed from the database
        $this->assertDatabaseMissing('transactions', [
            'id' => $transaction->id,
        ]);
    }
}
