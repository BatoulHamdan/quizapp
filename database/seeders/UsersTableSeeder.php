<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['id' => 7, 'firstname' => 'Tala', 'lastname' => 'Hamdan', 'email' => 'tala.hamdan@gmail.com', 'username' => 'Tala19', 'password' => bcrypt('tala123')],
            ['id' => 8, 'firstname' => 'Manar', 'lastname' => 'Shreif', 'email' => 'manarshreif@gmail.com', 'username' => 'Manoura', 'password' => bcrypt('manar1122')],
            ['id' => 19, 'firstname' => 'Ali', 'lastname' => 'Al Moussawi', 'email' => 'moussawiali2002@gmail.com', 'username' => 'Abo 3lesh', 'password' => bcrypt('ali2002')],
            .
        ]);
        
    }
}
