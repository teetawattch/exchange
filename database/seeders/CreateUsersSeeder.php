<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'user1@user.com',
                'password' => bcrypt('1234')
            ],
            [
                'username' => 'user2@user.com',
                'password' => bcrypt('1234')
            ]
            ];

            foreach($user as $key => $value){
                User::create($value);
            }
    }
}
