<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Transaction;
use App\Services\AttachmentStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function store(Request $request, AttachmentStore $store, Transaction $transaction)
    {
        $this->validate($request, [
            'file' => ['required', 'file'],
        ]);

        $file = $request->file('file');
        $attachment = $store->storeForTransaction($transaction, $file);

        $transaction->attachments()->save($attachment);
        $this->showSuccessMessage('Attachment uploaded!');

        return redirect()->route('transaction.show', compact('transaction'));
    }

    public function show(Request $request, Attachment $attachment)
    {
        if ($request->query('download') === 'true') {
            return Storage::download($attachment->file);
        }

        return Storage::response($attachment->file);
    }

    public function update(Request $request, Attachment $attachment)
    {
        $validated = $this->validate($request, [
            'name' => ['required', 'string'],
        ]);

        $attachment->fill($validated)->save();
        $this->showSuccessMessage('Attachment updated!');

        return redirect()->route('transaction.show', [
            'transaction' => $attachment->transaction,
        ]);
    }

    public function delete(Attachment $attachment)
    {
        $attachment->deleteWithFile();

        $this->showSuccessMessage('Attachment deleted!');

        return redirect()->route('transaction.show', [
            'transaction' => $attachment->transaction,
        ]);
    }
}
