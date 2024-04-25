<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $random_number = mt_rand(100, 999);
        $firstname = "Mac";
        $lastname = "serif";
        $user_id = strtolower($firstname) . $random_number;

        DB::table('users')->insert([
            'name' => $firstname . ' ' . $lastname,
            'password' => Hash::make('T$%JKL#45'),
            'firstname' => $firstname,
            'lastname' => $lastname,
            'role' => 'admin',
            'email' => 'macserif@gmail.com',
            'address' => 'roman agenrtey',
            'state' => 'West Virginia',
            'postalCode' => '26827891',
            'dob' => '12/23/1892',
            'country' => 'USA',
            'userId'=> $user_id,
        ]);
    }
}
