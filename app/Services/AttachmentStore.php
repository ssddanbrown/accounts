<?php

namespace App\Services;

use App\Models\Attachment;
use App\Models\Transaction;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AttachmentStore
{
    public function storeForTransaction(Transaction $transaction, UploadedFile $file): Attachment
    {
        $fileName = $file->getClientOriginalName();
        $fileStorageName = $fileName;
        $parentPath = "attachments/{$transaction->id}/";
        while (Storage::exists("$parentPath/{$fileStorageName}")) {
            $fileStorageName = Str::random(3).'-'.$fileStorageName;
        }

        $path = $file->storeAs("attachments/{$transaction->id}", $fileStorageName);

        $attachment = new Attachment([
            'name' => $fileName,
            'file' => $path,
            'size' => $file->getSize(),
            'extension' => $file->getClientOriginalExtension(),
        ]);

        $transaction->attachments()->save($attachment);

        return $attachment;
    }
}
