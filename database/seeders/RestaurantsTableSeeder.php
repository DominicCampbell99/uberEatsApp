<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([ 
            'name' => 'PunjabCurryHouse',
            'user_id' => 1,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('restaurants')->insert([ 
            'name' => 'Italian',
            'user_id' => 3,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
