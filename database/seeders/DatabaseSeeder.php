<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\product;
use App\Models\category;
use App\Models\product_category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       //  User::factory(100)->create();
       // category::factory(20)->create();
        // product::factory(1000)->create();
        product_category::factory(1000)->create();

        
    }
}
