<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCanLogin()
    {
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)
            ->get('/mypage')
            ->assertOk();
    }
}
