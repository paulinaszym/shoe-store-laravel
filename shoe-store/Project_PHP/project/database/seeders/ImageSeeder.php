<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            ['file_name' => 'Women/Women.jpg'],
            ['file_name' => 'Men/Men.jpg'],
            ['file_name' => 'Women/kozaki2.jpg'],
            ['file_name' => 'Women/kozaki1.jpg'],
            ['file_name' => 'Women/kozaki2.jpg'],
            ['file_name' => 'Women/szpilki.jpg'],
            ['file_name' => 'Men/meskie1.jpg'],
            ['file_name' => 'Men/meskie2.jpg'],

        ]);
    }
}
