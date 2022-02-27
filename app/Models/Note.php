<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $text
 */
class Note extends Model
{
    use HasFactory;

    protected $fillable = ['text'];
}
