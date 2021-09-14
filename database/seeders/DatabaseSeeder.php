<?php

namespace Database\Seeders;

use Database\Seeders\Adverts\AdvertsCategoriesTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User\User::factory(10)->create();
        $this->call(AdvertsCategoriesTableSeeder::class);
    }
}
