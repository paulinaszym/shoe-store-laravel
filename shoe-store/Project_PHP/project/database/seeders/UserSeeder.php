<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_id = DB::table('roles')->where('name','Admin')->first()->id;
        $user_id = DB::table('roles')->where('name','User')->first()->id;

        DB::table('users')->insert([
            [
                'username' => 'John_Doe',
                'firstname'=>'John',
                'surname'=>'Doe',
                'phone'=>'987654321',
                'email' =>'john.doe@gmail.com',
                'password' => bcrypt('secret'),
                'role_id' => $admin_id
            ],
            [
                'username' => 'Mary_Doe',
                'firstname'=>'Mary',
                'surname'=>'Doe',
                'phone'=>'777654321',
                'email' =>'mary.doe@gmail.com',
                'password' => bcrypt('secret'),
                'role_id' => $user_id
            ]

        ]);

        DB::table('users')->insert([
            'username' => 'Jane_Doe',
            'firstname'=>'Jane',
            'surname'=>'Doe',
            'phone'=>'321654987',
            'email' =>'jane.doe@gmail.com',
            'password' => bcrypt('secret2'),
            'role_id' => $user_id
        ]);

        $users_id = DB::table('users')->first()->id;

        DB::table('addresses')->insert([
            'street_address_1' => 'River 5',
            'street_address_2'=>'',
            'zip_code'=>'543-21',
            'city'=>'Cracow',
            'user_id' => $users_id
        ]);

        DB::table('addresses')->insert([
            'street_address_1' => 'Forest 5',
            'street_address_2'=>'',
            'zip_code'=>'543-11',
            'city'=>'Cracow',
            'user_id' => 3
        ]);

        DB::table('addresses')->insert([
            'street_address_1' => 'Forest 5',
            'street_address_2'=>'',
            'zip_code'=>'543-11',
            'city'=>'Cracow',
            'user_id' => 2
        ]);

        DB::table('carts')->insert([
            'user_id' => 3
        ]);

        DB::table('carts')->insert([
            'user_id' => 2
        ]);



    }
}
