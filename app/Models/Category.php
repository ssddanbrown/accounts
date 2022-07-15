<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name
 * @property string $short_name
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'short_name'];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public static function selectOptionsList(): array
    {
        return [null => '- None -'] + static::query()->select(['id', 'name', 'short_name'])
            ->orderBy('name')
            ->get()
            ->keyBy('id')
            ->map(fn(Category $category) => $category->short_name . " " . $category->name)
            ->toArray();
    }
}
