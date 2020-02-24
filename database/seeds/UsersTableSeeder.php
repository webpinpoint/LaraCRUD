<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
   
    public function run()
    {
        return User::create(
            [
                'name'=>'admin',
                'email'=>'admin@local.com',
                'password'=>Hash::make('admin')
            ]
            );
    }
}