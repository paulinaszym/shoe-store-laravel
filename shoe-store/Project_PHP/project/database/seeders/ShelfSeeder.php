<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShelfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shelves')->insert([
            [
                'product_id' => 1,
                'size' =>  39,
                'amount' => 342,
            ],
            [
                'product_id' => 1,
                'size' =>  40,
                'amount' => 5,
            ],
            [
                'product_id' => 2,
                'size' =>  37,
                'amount' => 155,
            ],
            [
                'product_id' => 2,
                'size' =>  38,
                'amount' => 142,
            ],
            [
                'product_id' => 3,
                'size' =>  39,
                'amount' => 2,
            ],
            [
                'product_id' => 4,
                'size' =>  43,
                'amount' => 267,
            ],
            [
                'product_id' => 4,
                'size' =>  42,
                'amount' => 6,
            ],
            [
                'product_id' => 4,
                'size' =>  41,
                'amount' => 50,
            ],
            [
                'product_id' => 5,
                'size' =>  39,
                'amount' => 7,
            ]

        ]);
    }
}
