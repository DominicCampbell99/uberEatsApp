<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([ 
            'name' => 'Dom',
            'user_id' => 2,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
