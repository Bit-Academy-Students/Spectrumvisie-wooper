<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'role_id' => 1,
            ],
            [
                'name' => 'trainer',
                'email' => 'trainer@gmail.com',
                'password' => Hash::make('trainer123'),
                'role_id' => 2,
            ],
            [
                'name' => 'ouder',
                'email' => 'ouder@gmail.com',
                'passwrod' => Hash::make('ouder123'),
                'role_id' => 3,
            ],
        ]);
    }
}
