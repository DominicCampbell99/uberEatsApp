<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'purchase_id' => 1,
            'dish_id' => 1,
            'quantity' => 2,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('orders')->insert([
            'purchase_id' => 1,
            'dish_id' => 2,
            'quantity' => 2,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
