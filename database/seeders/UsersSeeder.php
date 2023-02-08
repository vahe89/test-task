<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Adviser 1',
                'email' => 'adviser1@test.com',
                'username' => 'adviser1',
                'password' => Hash::make('bMWsgNOz')
            ],
            [
                'name' => 'Adviser 2',
                'email' => 'adviser2@test.com',
                'username' => 'adviser2',
                'password' => Hash::make('uK7KAeyL')
            ],
        ];
        User::upsert($data,['name', 'email', 'username', 'password']);
    }
}
