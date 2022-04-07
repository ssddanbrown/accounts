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

        $respData = $resp->getContent();
        $this->assertMatchesRegularExpression('/name="transacted_at".*?value="' . $expectedDate . '".*?>/s', $respData);
    }

    public function test_edit_shows_correct_category()
    {
        $categoryA = Category::factory()->create();
        $transaction = Transaction::factory()->create();
        $categoryC = Category::factory()->create();

        $resp = $this->whileLoggedIn()->get("/transactions/{$transaction->id}/edit");
        $resp->assertSee('<option value="' . $transaction->category_id . '"  selected', false);
        $resp->assertDontSee('<option value="' . $categoryA->id . '"  selected', false);
        $resp->assertDontSee('<option value="' . $categoryC->id . '"  selected', false);
    }
}
