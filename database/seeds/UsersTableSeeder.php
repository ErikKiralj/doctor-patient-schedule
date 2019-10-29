<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
    {
        DB::table('users')->insert(array(
            array(
              'id' => '1',
              'name' => 'Ivan Mirković',
              'oib' => '87456324587',
              'mbo' => '123456789',
              'email' => 'ivan@example.com',
              'password' => bcrypt('aaaaaaaa'),
              'gender' => 'muško',
              'date_of_birth' => '1994-08-21',
              'phone_number' =>'031547896',
              'zip_code' => '31000',
              'address' => 'Zagrebačka 35',
              'city' => 'Osijek',
            ),
        ));
    }
}
