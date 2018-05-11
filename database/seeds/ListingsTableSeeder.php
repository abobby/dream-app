<?php

use Illuminate\Database\Seeder;

class ListingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('listings')->get()->count() == 0){

            DB::table('listings')->insert([
                [
                    'category_id' => 1,
                    'seller_id' => 1,
                    'title' => '1999 International DT466 Box Truck with Rail Gate',
                    'description' => 'In-Frame overhaul done in October 2016, Safety Certified until November 2018, Backup sensor, Box is 22 ft., Well maintained, Good tires and brakes, Transmission has small leak, READY FOR WORK!!',
                    'lyear' => 1999,
                    'lmake' => 'DT',
                    'lmodel' => 'DT466',
                    'price' => '11999.00',
                    'meta_data' => '{"color":"white and yellow","transmission":"6 Speed","bodytype":"auto"}',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ],
                [
                    'category_id' => 1,
                    'seller_id' => 2,
                    'title' => '1985 Ford L9000 Dump Truck',
                    'description' => 'New electric cable tarp, New tires, Rebuilt engine, New steering tires, New brakes, Well maintained.',
                    'lyear' => 1985,
                    'lmake' => 'Ford',
                    'lmodel' => 'L9000',
                    'price' => '25000.00',
                    'meta_data' => '{"color":"copper and silver","transmission":"13 Speed","bodytype":"Dump Truck"}',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ],
                [
                    'category_id' => 2,
                    'seller_id' => 3,
                    'title' => '2014 Nissan Versa SV',
                    'description' => 'Beautiful condition, Interior and Exterior both are very good, New tires, Serviced completely, GREAT PRICE!',
                    'lyear' => 2014,
                    'lmake' => 'Nissan',
                    'lmodel' => 'Versa',
                    'price' => '7500.00',
                    'meta_data' => '{"color":"vibrant blue","transmission":"automatic","bodytype":"sedan"}',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ],
                [
                    'category_id' => 2,
                    'seller_id' => 3,
                    'title' => '1995 Honda Accord EX',
                    'description' => '2.2 liter, Extra parts included, Crank seal needs to be replaced (has a current leak), 78,000 on transmission (replaced in 2015), New tires, New starter and ignition, Has been well maintained, Fuel efficient, Grandmother was original owner, Carfax available upon request, Low original miles, MOTIVATED SELLER!!',
                    'lyear' => 1995,
                    'lmake' => 'Honda',
                    'lmodel' => 'Accord',
                    'price' => '2500.00',
                    'meta_data' => '{"color":"red","transmission":"automatic","bodytype":"sedan"}',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ],
                [
                    'category_id' => 3,
                    'seller_id' => 4,
                    'title' => '2005 Harley-Davidson FLHTK Electra Glide Ultra Limited',
                    'description' => 'Kept in climate controlled garaged, Stage 1 kit, Two into one Vance & Hines exhaust, GPS, All maintenance up to date, Only selling due to no longer able to ride, A MUST SEE!! ',
                    'lyear' => 2005,
                    'lmake' => 'Harley-Davidson',
                    'lmodel' => 'Electra',
                    'price' => '8495.00',
                    'meta_data' => '{"color":"Arctic Pearl","transmission":"traditional"}',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1
                ]

            ]);

        } else { echo "Table is not empty"; }
    }
}
