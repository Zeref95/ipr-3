<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $password =  'password';
        $response = $this->post(route('api_login'));
        $response->assertStatus(401);

        $user = User::factory()->create([
            'password' => Hash::make($password),
        ]);
        $response = $this->postJson(route('api_login'), [
            'email' => $user->email,
            'password' => $password,
        ]);
        $response->assertStatus(200);
        $this->arrayHasKey('token');

        $response = $this->getJson(route('api_test_auth'), ['Authorization' => $response['token']]);
        $response->assertStatus(200);
    }
}
