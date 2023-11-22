<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [ 'name'=>'User',
              'email'=>'user@gmail.com',
              'password'=>bcrypt('123456'),
              'role' => 0
        ],
        [ 'name'=>'Admin',
              'email'=>'admin@gmail.com',
              'password'=>bcrypt('123456'),
              'role' => 1
            ]
        ];

        foreach($users as $user)
        {
            User::create($user);
        }
    }
}
