<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('reviews')->get()->count() == 0){

            DB::table('reviews')->insert([
                [
                    'listing_id' => 1,
                    'name' => 'One User',
                    'email' => 'user1@review.com',
                    'comment' => 'Amazing product, would like to try',
                    'rating' => 5,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ],
                [
                    'listing_id' => 1,
                    'name' => 'Two User',
                    'email' => 'user2@review.com',
                    'comment' => 'Color look impressive, Great!',
                    'rating' => 3,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ],
                [
                    'listing_id' => 2,
                    'name' => 'Three User',
                    'email' => 'user3@review.com',
                    'comment' => 'Great price',
                    'rating' => 4,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ],
                [
                    'listing_id' => 3,
                    'name' => 'Four User',
                    'email' => 'user4@review.com',
                    'comment' => 'Wow, excellent deal. Active seller, looking forward for this product',
                    'rating' => 5,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ],
                [
                    'listing_id' => 5,
                    'name' => 'Five User',
                    'email' => 'user5@review.com',
                    'comment' => 'Product looks amazing, seller is not responding at all for mutiple queries of mine.',
                    'rating' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ]

            ]);

        } else { echo "Table is not empty"; }
    }
}
