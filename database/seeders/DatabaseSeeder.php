<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = Category::factory(5)->create();

        /** @var Category $category */
        foreach ($categories as $category) {
            Transaction::factory(50)->create(['category_id' => $category->id]);
        }
    }
}
