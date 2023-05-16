<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property Carbon $transacted_at
 * @property string $transacted_with
 * @property string $description
 * @property string $notes
 * @property int $value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $category_id
 * @property Collection<Attachment> $attachments
 */
class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'transacted_at' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'value' => MoneyCast::class,
    ];

    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
