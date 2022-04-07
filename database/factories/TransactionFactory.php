<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $value = rand(0, 1000000) - 500000;
        return [
            'transacted_at' => $this->faker->date('Y-m-d'),
            'transacted_with' => $this->faker->company,
            'description' => $this->faker->words(5, true),
            'notes' => $this->faker->paragraph,
            'value' => $value,
            'category_id' => Category::factory(),
        ];
    }
}
