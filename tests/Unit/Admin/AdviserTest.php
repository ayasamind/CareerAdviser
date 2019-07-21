<?php

namespace Tests\Feature\Adviser;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Adviser;

class AdviserTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

     /**
     * testCanCreateAdviser
     * @author ayasamind
     */
    public function testCanCreateAdviser()
    {
        $this->post('admin/login', [
            'email'    => 'admin@example.com',
            'password' => 'password'
        ]);

        $url = route('admin.advisers.store');

        $data = [
            'name'  => 'アドバイザー',
            'email' => 'adviser@example.com'
        ];

        $response = $this->post($url, $data);
        $this->assertDatabaseHas('advisers', [
            'name'   => $data['name'],
            'email'  => $data['email']
        ]);
        $response->assertRedirect('admin/advisers/1');
    }
}
