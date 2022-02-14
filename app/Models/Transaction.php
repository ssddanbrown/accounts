<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property Carbon $transacted_at
 * @property string $transacted_with
 * @property string $description
 * @property string $notes
 * @property int $value
 * @property int $vat
 * @property Carbon $created_at
 * @property Carbon $updated_at
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
        'vat' => MoneyCast::class,
    ];

}
