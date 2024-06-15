<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_honeypot_block()
    {
        $response = $this->post('/honeypost', [
            
            'email' => 'testuser@example.com',
            'password' => 'password',   
            'my_name' => 'spamtext', 
        ]);
        
        $response->assertStatus(200);
       
    }
}
