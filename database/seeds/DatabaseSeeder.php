<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ListingCategoriesTableSeeder::class);
        $this->call(SellersTableSeeder::class);
        $this->call(ListingsTableSeeder::class);
        $this->call(ListingImagesTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);

    }
}
