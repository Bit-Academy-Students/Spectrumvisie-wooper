<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{

    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    public function test_logged_in_succesfull()
    {
        $user = User::factory()->create([
            'email' => 'jayven@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => 1
        ]);

        $data = [
            'email' => 'jayven@gmail.com',
            'password' => '123456'
        ];

        $response = $this->post('/login', $data);
        $this->assertAuthenticatedAs($user);
        $response->assertRedirect('/');
    }

    public function test_logout(): void
    {
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);

        $this->post('/login', [
            'email' => 'user@example.com',
            'password' => 'password',
        ]);

        $this->assertAuthenticatedAs($user);

        $response = $this->post('/logout');

        $response->assertRedirect('/');

        $this->assertGuest();
    }

    public function test_wrong_password(): void
    {
        User::factory()->create([
            'email' => 'jayven@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => 1
        ]);

        $data = [
            'email' => 'jayven@gmail.com',
            'password' => 'wrong'
        ];


        $response = $this->post('/login', $data);

        $response->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_wrong_email(): void
    {
        //Make the user with factory
        User::factory()->create([
            'email' => 'jayven@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => 1
        ]);

        $data = [
            'email' => 'nee@gmail.com',
            'password' => '123456'
        ];


        $response = $this->post('/login', $data);

        $response->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_no_input(): void
    {
        //Make the user with factory
        User::factory()->create([
            'email' => 'jayven@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => 1
        ]);

        $data = [
            'email' => '',
            'password' => ''
        ];


        $response = $this->post('/login', $data);

        $response->assertSessionHasErrors('email');

        //make sure the user is still a guest and didnt login
        $this->assertGuest();
    }

    public function test_admin(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);

        $this->post('/login', [
            'email' => 'admin@example.com',
            'password' => 'password',
        ]);
        $this->assertEquals('admin', $admin->role->role_name);
    }
    public function test_trainer(): void
    {
        $trainer = User::factory()->create([
            'email' => 'trainer@example.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);

        $this->post('/login', [
            'email' => 'trainer@example.com',
            'password' => 'password',
        ]);
        $this->assertEquals('trainer', $trainer->role->role_name);
    }

    public function test_ouder(): void
    {
        $ouder = User::factory()->create([
            'email' => 'ouder@example.com',
            'password' => Hash::make('password'),
            'role_id' => 3,
        ]);

        $this->post('/login', [
            'email' => 'ouder@example.com',
            'password' => 'password',
        ]);
        $this->assertEquals('ouder', $ouder->role->role_name);
    }

    public function test_AdminDashboard_access()
    {
        User::factory()->create([
            'email' => 'trainer@example.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);

        $this->post('/login', [
            'email' => 'trainer@example.com',
            'password' => 'password',
        ]);

        $response = $this->get('/admin-dashboard');

        $response->assertStatus(404);
    }
}
