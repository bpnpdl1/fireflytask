<?php

namespace App\Http\Controllers;

use App\Enums\TransactionTypeEnum;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $type= request('type');

        

        $transactions = Transaction::where('user_id', auth()->id())
                         ->when($type, function($query) use ($type) {
                            return $query->where('type', $type);
                        })->get();
        
        return view('transaction.index',[
            'transactions' => $transactions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user= auth()->user();
        return view('transaction.create',[
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'type' => ['required', new Enum(TransactionTypeEnum::class)],
            'transaction_date' => 'required|date',
        ]);

        Transaction::create([
            'description' => $request->description,
            'amount' => $request->amount,
            'type' => $request->type,
            'transaction_date' => $request->transaction_date,
            'user_id' => auth()->id(),
        ]);
    
        session()->flash('success', 'Transaction created successfully.');

        return redirect()->route('transaction.index')->with('success', 'Transaction created successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transaction.edit', [
            'transaction' => $transaction,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'type' => ['required', new Enum(TransactionTypeEnum::class)],
            'transaction_date' => 'required|date',
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->update([
            'description' => $request->description,
            'amount' => $request->amount,
            'type' => $request->type,
            'transaction_date' => $request->transaction_date,
        ]);

        session()->flash('success', 'Transaction updated successfully.');

        return redirect()->route('transaction.index')->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        session()->flash('success', 'Transaction deleted successfully.');

        return redirect()->route('transaction.index')->with('success', 'Transaction deleted successfully.');
    }
}
