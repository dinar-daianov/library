<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthorTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_create_author()
    {
        $response = $this->post('/authors/create', [
            'name' => 'John Doe',
            'country' => 'United States',
            'birthday' => '1990-01-01',
            'gender' => 'Мужской'
        ]);

        $response->assertRedirect('/authors');
    }
}
