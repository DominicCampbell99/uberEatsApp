<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dishes')->insert([ 
            'name' => 'korma',
            'price' => 60,
            'description' => 'An indian dish',
            'restaurant_id' => 1,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('dishes')->insert([ 
            'name' => 'butter chicken',
            'price' => 60,
            'description' => 'An indian dish',
            'restaurant_id' => 1,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        DB::table('dishes')->insert([ 
            'name' => 'tika masala',
            'price' => 60,
            'description' => 'An indian dish',
            'restaurant_id' => 1,
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
