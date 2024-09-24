<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\category;
use App\Models\product;
use App\Models\store;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       /* store::factory(5)->create();
        category::factory(10)->create();
        product::factory(100)->create();*/

        Admin::factory(3)->create();
        //$this->call(UserSeeder::class);
    }
}
