<?php

use Illuminate\Database\Seeder;

class ListingImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('listing_images')->get()->count() == 0){

            DB::table('listing_images')->insert([
                [
                    'listing_id' => 1,
                    'thumb_image' => 'thumb.jpg',
                    'full_image' => 'full1.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'listing_id' => 1,
                    'thumb_image' => 'full2.jpg',
                    'full_image' => 'full2.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'listing_id' => 1,
                    'thumb_image' => 'full3.jpg',
                    'full_image' => 'full3.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'listing_id' => 2,
                    'thumb_image' => 'thumb.jpg',
                    'full_image' => 'full1.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'listing_id' => 2,
                    'thumb_image' => 'full2.jpg',
                    'full_image' => 'full2.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'listing_id' => 2,
                    'thumb_image' => 'full3.jpg',
                    'full_image' => 'full3.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'listing_id' => 3,
                    'thumb_image' => 'thumb.jpg',
                    'full_image' => 'full1.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'listing_id' => 3,
                    'thumb_image' => 'full2.jpg',
                    'full_image' => 'full2.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'listing_id' => 4,
                    'thumb_image' => 'thumb.jpg',
                    'full_image' => 'full1.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'listing_id' => 5,
                    'thumb_image' => 'full2.jpg',
                    'full_image' => 'full2.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'listing_id' => 5,
                    'thumb_image' => 'thumb.jpg',
                    'full_image' => 'full1.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'listing_id' => 5,
                    'thumb_image' => 'full2.jpg',
                    'full_image' => 'full2.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            ]);

        } else { echo "Table is not empty"; }
    }
}
