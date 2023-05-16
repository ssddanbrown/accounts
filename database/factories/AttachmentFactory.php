<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attachment>
 */
class AttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $name = Str::slug(implode('-', $this->faker->words(3))).'.txt';

        return [
            'name' => $name,
            'file' => $name,
            'extension' => 'txt',
            'size' => rand(50, 100000),
            'transaction_id' => Transaction::factory(),
        ];
    }
}
