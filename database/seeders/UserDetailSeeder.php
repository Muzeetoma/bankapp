<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = DB::table('users')->orderBy('id', 'desc')->first();

        $data = [
            [
                'cardType' => 'mastercard',
                'cardCvv' => '234',
                'cardNumber' => '1234 2234 1789 1234 1233',
                'cardExpiry' => '09/25',
                'user_id' => $user->id,
            ],
            [
                'cardType' => 'visacard',
                'cardCvv' => '561',
                'cardNumber' => '1234 2234 1789 1234 1654',
                'cardExpiry' => '09/25',
                'user_id' => $user->id,
            ],
            [
                'cardType' => 'mastercard',
                'cardCvv' => '234',
                'cardNumber' => '1234 2234 1789 1234 6711',
                'cardExpiry' => '09/25',
                'user_id' => $user->id,
            ]
        ];
    
        foreach ($data as $record) {
            DB::table('user_details')->insert($record);
        }
    }
    
}
