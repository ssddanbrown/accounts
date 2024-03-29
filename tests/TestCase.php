<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Ssddanbrown\AssertHtml\TestsHtml;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseMigrations;
    use TestsHtml;

    protected function whileLoggedIn(): self
    {
        $user = User::factory()->create();

        return $this->actingAs($user);
    }
}
