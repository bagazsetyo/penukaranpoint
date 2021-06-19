<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'TestUser',
            'email' => 'testuser@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('testuser'),
        ]);
        $user->assignRole('user');

        $admin = User::create([
            'name' => 'TestAdmin',
            'email' => 'testadmin@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('testadmin'),
        ]);
        $admin->assignRole('admin');
    }
}
