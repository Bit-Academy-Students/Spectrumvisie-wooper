<?php

namespace Tests\Feature;

use App\Models\PendingUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    public function test_register_correct(): void
    {

        $data = [
            'name' => 'jayven',
            'email' => 'jayven@gmail.com',
            'role_id' => 2,
            'certificate_code' => '1',
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        $response = $this->post('/register', $data);
        // check if the user is in the databse
        $this->assertDatabaseHas('users_pending', [
            'name' => 'jayven',
            'email' => 'jayven@gmail.com',
        ]);

        // check the password seperatly because it is hashed
        $user = PendingUser::where('email', 'jayven@gmail.com')->first();
        $this->assertTrue(Hash::check('password', $user->password));

        $response->assertRedirect('/login');
    }

    public function test_register_exeption_email(): void
    {
        //Create a user
        FacadesDB::table('users_pending')->insert([
            'name' => 'Existing User',
            'email' => 'jayven@gmail.com',
            'role_id' => 2,
            'password' => Hash::make('password'),
        ]);

        // create a user with the same email
        $data = [
            'name' => 'jayven',
            'email' => 'jayven@gmail.com',
            'role_id' => 2,
            'certificate_code' => '1',
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        $response = $this->post('/register', $data);

        $response->assertSessionHasErrors(['email']);
        //check if the user is not inserted while still giving a error
        $this->assertDatabaseCount('users_pending', 1);
    }

    public function test_register_exeption_password_missmatch(): void
    {
        $data = [
            'name' => 'jayven',
            'email' => 'jayven@gmail.com',
            'role_id' => 2,
            'certificate_code' => '1',
            'password' => 'password',
            'password_confirmation' => 'no'
        ];

        $response = $this->post('/register', $data);

        $response->assertSessionHasErrors(['password']);
    }

    public function test_register_exeption_short_password(): void
    {
        $data = [
            'name' => 'jayven',
            'email' => 'jayven@gmail.com',
            'role_id' => 2,
            'certificate_code' => '1',
            'password' => '123',
            'password_confirmation' => '123'
        ];

        $response = $this->post('/register', $data);

        $response->assertSessionHasErrors(['password']);
    }

    public function test_empty_fields(): void
    {
        //make the data with empty fields
        $data = [
            'name' => '',
            'role_id' => '',
            'certificate_code' => '',
            'email' => '',
            'password' => '',
            'password_confirmation' => ''
        ];

        $response = $this->post('/register', $data);

        $response->assertSessionHasErrors(['name', 'email', 'password']);

        //check if the user is not inserted while still giving a error
        $this->assertDatabaseCount('users_pending', 0);
    }


    public function test_register_invalid_certificate(): void
    {
        $data = [
            'name' => 'jayven',
            'email' => 'jayven@gmail.com',
            'role_id' => 2,
            'certificate_code' => 'INVALID',
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        $response = $this->post('/register', $data);

        $response->assertSessionHasErrors(['certificate_code']);

        $this->assertDatabaseCount('users_pending', 0);
    }


    //public function test_register_invalid_role(): void
    //{
    //  $data = [
    //    'name' => 'jayven',
    //  'email' => 'jayven@gmail.com',
    //'role_id' => 999,
    //'certificate_code' => '1',
    //'password' => 'password',
    //'password_confirmation' => 'password'
    //];


    //$response = $this->post('/register', $data);

    //$response->assertSessionHasErrors(['role_id']);

    //$this->assertDatabaseCount('users_pending', 0);
    //}

}
