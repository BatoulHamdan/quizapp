<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 7,
                'firstname' => 'Tala',
                'lastname' => 'Hamdan',
                'email' => 'tala.hamdan@gmail.com',
                'username' => 'Tala19',
                'password' => Hash::make('tala123'),
            ],
            [
                'id' => 8,
                'firstname' => 'Fatima',
                'lastname' => 'Harb',
                'email' => 'fatimahrb@gmail.com',
                'username' => 'Fatima9',
                'password' => Hash::make('fatima123'),
            ],
        ]);
    }
}
