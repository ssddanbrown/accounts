<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public static function selectOptionsList(): array
    {
        return [null => '- None -'] + static::query()->select(['id', 'name'])
            ->get()
            ->pluck('name', 'id')
            ->toArray();
    }
}
