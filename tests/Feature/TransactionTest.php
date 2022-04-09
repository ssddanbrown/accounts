<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Transaction;
use Carbon\Carbon;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    public function test_create_form_defaults_date_to_last_month()
    {
        $expectedDate = Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d');
        $resp = $this->whileLoggedIn()->get("/transactions/create");

        $this->withHtml($resp)->assertFieldHasValue('transacted_at', $expectedDate);
    }

    public function test_edit_shows_correct_category()
    {
        $categoryA = Category::factory()->create();
        $transaction = Transaction::factory()->create();
        $categoryC = Category::factory()->create();

        $html = $this->withHtml($this->whileLoggedIn()->get("/transactions/{$transaction->id}/edit"));
        $html->assertFieldHasSelected('category_id', $transaction->category_id);
        $html->assertFieldNotHasSelected('category_id', $categoryA->id);
        $html->assertFieldNotHasSelected('category_id', $categoryC->id);
    }
}
