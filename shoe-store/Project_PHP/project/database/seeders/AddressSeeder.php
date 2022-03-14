<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('addresses')->insert([
            'street_address_1' => 'Golden 12',
            'street_address_2'=>'local 5',
            'zip_code'=>'12-345',
            'city'=>'Warsaw'
        ]);
    }
}
