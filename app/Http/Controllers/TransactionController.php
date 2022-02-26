<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected array $rules = [
        'transacted_at' => ['required', 'date'],
        'transacted_with' => ['required', 'string'],
        'value' => ['required', 'numeric'],
        'description' => ['nullable', 'string'],
        'notes' => ['nullable', 'string'],
    ];

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validate($request, $this->rules);

        $transaction = new Transaction($validated);
        $transaction->save();

        $this->showSuccessMessage("Transaction created!");

        return redirect()->route('transaction.show', compact('transaction'));
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $validated = $this->validate($request, $this->rules);

        $transaction->fill($validated)->save();
        $this->showSuccessMessage("Transaction updated!");

        return redirect()->route('transaction.show', compact('transaction'));
    }

    public function delete(Transaction $transaction)
    {
        foreach ($transaction->attachments as $attachment) {
            $attachment->deleteWithFile();
        }
        $transaction->delete();

        $this->showSuccessMessage("Transaction deleted!");
        return redirect()->route('dashboard');
    }
}
