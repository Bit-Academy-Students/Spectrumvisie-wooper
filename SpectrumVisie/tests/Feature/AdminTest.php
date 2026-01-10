<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminTest extends TestCase
{

    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    public function test_admin_adds_certificate(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);

        $this->actingAs($admin);

        $data = [
            'certificaat' => 'CERT123'
        ];

        $response = $this->post('/certificate', $data);

        $this->assertDatabaseHas('certificate', [
            'certificate_code' => 'CERT123',
        ]);

        $response->assertSessionHas('success', 'Certificaat toegevoegd');
    }

    public function test_admin_accepts_pending_user(): void
    {
        $pendingId = DB::table('users_pending')->insertGetId([
            'name' => 'jayven',
            'email' => 'jayven@gmail.com',
            'role_id' => 2,
            'password' => Hash::make('password'),
        ]);

        $admin = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);

        $this->actingAs($admin);

        $response = $this->post(route('pending.accept', ['id' => $pendingId]));

        $this->assertDatabaseHas('users', [
            'email' => 'jayven@gmail.com',
            'role_id' => 2,
        ]);

        $this->assertDatabaseMissing('users_pending', [
            'email' => 'jayven@gmail.com',
        ]);

        $response->assertSessionHas('success', 'Je hebt jayven geregistreerd');
    }

    public function test_admin_rejects_pending_user(): void
    {
        $pendingId = DB::table('users_pending')->insertGetId([
            'name' => 'jayven',
            'email' => 'jayven@gmail.com',
            'role_id' => 2,
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);

        $admin = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => 1, // admin role
        ]);

        $this->actingAs($admin);

        $response = $this->post(route('pending.reject', ['id' => $pendingId]));

        $this->assertDatabaseMissing('users_pending', [
            'email' => 'jayven@gmail.com',
        ]);

        $this->assertDatabaseMissing('users', [
            'email' => 'jayven@gmail.com',
        ]);

        $response->assertSessionHas('success', 'Je hebt jayven verwijderd');
    }
}
