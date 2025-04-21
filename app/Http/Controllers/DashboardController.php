<?php

namespace App\Http\Controllers;

use App\Enums\TransactionTypeEnum;
use App\Models\Transaction;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index(): View
    {
        $transactions = Transaction::query()
            ->where('user_id', auth()->id())
            ->get();
        $totalIncomes = $transactions->where('type', TransactionTypeEnum::INCOME->value)->sum('amount');
        $totalExpenses = $transactions->where('type', TransactionTypeEnum::EXPENSE->value)->sum('amount');

        return view('dashboard', [
            'totalIncomes' => $totalIncomes,
            'totalExpenses' => $totalExpenses,
            'transactions' => $transactions,
        ]);
    }
}
