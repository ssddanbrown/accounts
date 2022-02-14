<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

/**
 * @property int $id
 * @property string $name
 * @property string $file
 * @property int $size
 * @property string $extension
 * @property int $transaction_id
 * @property Transaction $transaction
 */
class Attachment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

    public function sizeFormatted(): string
    {
        $format = 'B';
        $formats = ['TB', 'GB', 'MB', 'KB'];
        $size = $this->size;
        while ($size > 1000) {
            $size = $size / 1000;
            $format = array_pop($formats);
        }

        $number = number_format($size, 2, '.', ',');
        return "{$number} {$format}";
    }

    public function deleteWithFile()
    {
        Storage::delete($this->file);
        $this->delete();
    }
}
