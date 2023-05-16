<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Services\AttachmentStore;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class TransactionController extends Controller
{
    protected array $rules = [
        'transacted_at' => ['required', 'date'],
        'transacted_with' => ['required', 'string'],
        'value' => ['required', 'numeric'],
        'description' => ['nullable', 'string'],
        'notes' => ['nullable', 'string'],
        'category_id' => ['nullable', 'int', 'exists:categories,id'],
    ];

    public function create(Request $request)
    {
        $modelId = $request->get('model');
        $model = $modelId ? Transaction::query()->findOrFail($modelId) : null;

        return view('transactions.create', compact('model'));
    }

    public function store(Request $request, AttachmentStore $attachmentStore)
    {
        $validated = $this->validate($request, $this->rules);

        $transaction = new Transaction($validated);
        $transaction->save();

        $attachment = $request->file('file');
        if ($attachment instanceof  UploadedFile) {
            $attachmentStore->storeForTransaction($transaction, $attachment);
        }

        $this->showSuccessMessage('Transaction created!');

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
        $this->showSuccessMessage('Transaction updated!');

        return redirect()->route('transaction.show', compact('transaction'));
    }

    public function delete(Transaction $transaction)
    {
        foreach ($transaction->attachments as $attachment) {
            $attachment->deleteWithFile();
        }
        $transaction->delete();

        $this->showSuccessMessage('Transaction deleted!');

        return redirect()->route('dashboard');
    }

    public function copy(Transaction $transaction)
    {
        return redirect()->route('transaction.create', ['model' => $transaction->id]);
    }
}
