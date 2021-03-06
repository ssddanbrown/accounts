<?php

namespace Tests\Feature;

use App\Models\Note;
use Tests\TestCase;

class HomeTest extends TestCase
{
    public function test_home_redirects_to_login_if_not_authed()
    {
        $resp = $this->get('/');
        $resp->assertRedirect('/login');
    }

    public function test_home_dash_loads()
    {
        $resp = $this->whileLoggedIn()->get('/');
        $resp->assertOk();
        $resp->assertSee('Recent Transactions');
    }

    public function test_latest_note_shows_on_home_dash()
    {
        Note::factory()->create(['text' => 'This is a testing note a']);
        $this->travel(5)->days();
        Note::factory()->create(['text' => 'This is a testing note b']);

        $resp = $this->whileLoggedIn()->get('/');
        $resp->assertSee('Latest Note');
        $resp->assertSee('This is a testing note b');
        $resp->assertDontSee('This is a testing note a');
    }
}
