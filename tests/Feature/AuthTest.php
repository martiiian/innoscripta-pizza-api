<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;


class AuthTest extends TestCase
{

    protected $user = null;

    public $successFormat = [
        'access_token',
        'token_type',
        'expires_in'
    ];

    public function getUser()
    {
        if (!$this->user) {
            $this->user = factory(User::class, 1)->create()[0];
        }
        return $this->user;
    }

    public function successLogin()
    {
        $user = $this->getUser();
        return $this->json('post', '/api/auth/login', [
            'phone' => $user->phone,
            'password' => 'password'
        ]);
    }

    public function test_failed_authentication()
    {
        $response = $this->json('post', '/api/auth/login', [
            'phone' => '86860870',
            'password' => 'biba'
        ]);

        $response->assertStatus(401);
    }

    public function test_success_auth()
    {
        $loginResponse = $this->successLogin();

        $loginResponse->assertStatus(200)
            ->assertJsonStructure($this->successFormat);
    }

    public function test_refresh_token()
    {
        $loginResponse = $this->successLogin();

        $data = $loginResponse->getOriginalContent();
        $response = $this->json('post', '/api/auth/refresh', [], [
            'Authorization' => "Bearer {$data['access_token']}"
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure($this->successFormat);
    }

    public function test_getting_user()
    {
        $loginResponse = $this->successLogin();

        $data = $loginResponse->getOriginalContent();
        $response = $this->json('post', '/api/auth/me', [], [
            'Authorization' => "Bearer {$data['access_token']}"
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'name',
                    'email',
                    'phone',
                    'address'
                ]
            ]);
    }
}
