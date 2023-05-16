<?php

namespace App\Casts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class MoneyCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  mixed  $value
     * @return mixed
     */
    public function get(Model $model, string $key, mixed $value, array $attributes)
    {
        return $value;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  mixed  $value
     * @return mixed
     */
    public function set(Model $model, string $key, mixed $value, array $attributes)
    {
        return is_int($value) ? $value : round(floatval($value) * 100);
    }
}
