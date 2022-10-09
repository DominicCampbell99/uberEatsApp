<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([ 
            'name' => 'PunjabCurryHouse',
            'email' => 'punjab@123',
            'role'=> 'restaurant',
            'address'=> '5 street st',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'email_verified_at' => DB::raw('CURRENT_TIMESTAMP'),
            'remember_token' => '',
        ]);

        DB::table('users')->insert([ 
            'name' => 'Dom',
            'email' => 'dom@123',
            'role'=> 'customer',
            'address'=> '6 street st',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'email_verified_at' => DB::raw('CURRENT_TIMESTAMP'),
            'remember_token' => '',
        ]);

        DB::table('users')->insert([ 
            'name' => 'Italian',
            'email' => 'italy@123',
            'role'=> 'restaurant',
            'address'=> '8 street st',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'email_verified_at' => DB::raw('CURRENT_TIMESTAMP'),
            'remember_token' => '',
        ]);
    }
}
