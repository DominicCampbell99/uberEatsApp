<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(RestaurantsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(DishesTableSeeder::class);
        $this->call(PurchasesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        
    }
}
