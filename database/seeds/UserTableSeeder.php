<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =  User::create([
            'is_admin' => '0',
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('12345678')
        ]);

        $user =  User::create([
            'is_admin' => '1',
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
