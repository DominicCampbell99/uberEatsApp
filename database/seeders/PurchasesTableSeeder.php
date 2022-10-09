<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PurchasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purchases')->insert([
            'user_id' => 2,
            'price' => 120,
            'restaurant_id' => 1,
            'delivery_address' => '10 smith street',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
