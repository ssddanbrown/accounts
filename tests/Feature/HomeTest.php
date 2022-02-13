<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    public function test_root_url_visit_shows_dash()
    {
        $response = $this->whileLoggedIn()->get('/');
        $response->assertRedirect(route('dashboard'));
    }
}
