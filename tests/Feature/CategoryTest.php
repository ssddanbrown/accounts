<?php

namespace Tests\Feature;

use App\Models\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{

    public function test_category_edit_input_does_not_show_names_encoded()
    {
        $category = Category::factory()->create(['name' => 'Donkey & Cat']);
        $resp = $this->whileLoggedIn()->get("/categories/{$category->id}/edit");
        $resp->assertSee('value="Donkey &amp; Cat"', false);
    }

}
