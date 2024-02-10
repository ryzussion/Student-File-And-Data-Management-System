<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'first_name' => 'admin',
            // 'last_name' => 'admin',
            // 'name' => 'admin',
            'email'=> 'admin@gmail.com',
            'password'=> Hash::make(1234),
            'role' => 0,
        ];

        User::create($user);
    }
}
