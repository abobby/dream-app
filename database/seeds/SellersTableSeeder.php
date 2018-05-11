<?php

use Illuminate\Database\Seeder;

class SellersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('sellers')->get()->count() == 0){

            DB::table('sellers')->insert([
                [
                    'type' => 'dealer',
                    'name' => 'Demo Dealer One',
                    'address' => 'Bangalore,KA,India',
                    'phone' => '9090990901',
                    'email' => 'dealerone@demo.com',
                    'website' => 'www.dealerone.com',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1,
                ],
                [
                    'type' => 'broker',
                    'name' => 'Demo Broker One',
                    'address' => 'Bangalore,KA,India',
                    'phone' => '9090990902',
                    'email' => 'brokerone@demo.com',
                    'website' => 'www.brokerone.com',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1,
                ],
                [
                    'type' => 'private',
                    'name' => 'Demo Private One',
                    'address' => 'Bangalore,KA,India',
                    'phone' => '9090990903',
                    'email' => 'privateone@demo.com',
                    'website' => 'www.privateone.com',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1,
                ],
                [
                    'type' => 'private',
                    'name' => 'Demo Private Two',
                    'address' => 'Pune,MH,India',
                    'phone' => '9090990904',
                    'email' => 'privatetwo@demo.com',
                    'website' => 'www.privatetwo.com',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1,
                ],

            ]);

        } else { echo "Table is not empty"; }
    }
}
