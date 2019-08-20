<?php

use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insert(array(
            array(
              'id' => '1',
              'name' => 'Marko Marković',
              'email' => 'marko@example.com',
              'password' => bcrypt('aaaaaaaa'),
              'phone_number' =>'25485784',
              'spec' => 'kirurg',
              'practise_name' => 'KBC Osijek',
              'practise_address' => 'Josipa Huttlera 4',
              'zip_code' => '31000',
              'city' => 'Osijek',
            ),
            array(
                'id' => '2',
                'name' => 'Ivan Marković',
                'email' => 'ivan@example.com',
                'password' => bcrypt('aaaaaaaa'),
                'phone_number' =>'25485784',
                'spec' => 'pedijatar',
                'practise_name' => 'KBC Osijek',
                'practise_address' => 'Josipa Huttlera 4',
                'zip_code' => '31000',
                'city' => 'Osijek',
            ),
            array(
                'id' => '3',
                'name' => 'Petar Marković',
                'email' => 'petar@example.com',
                'password' => bcrypt('aaaaaaaa'),
                'phone_number' =>'25485784',
                'spec' => 'neurolog',
                'practise_name' => 'KBC Osijek',
                'practise_address' => 'Josipa Huttlera 4',
                'zip_code' => '31000',
                'city' => 'Osijek',
              ),
              array(
                'id' => '4',
                'name' => 'Karlo Marković',
                'email' => 'karlo@example.com',
                'password' => bcrypt('aaaaaaaa'),
                'phone_number' =>'25485784',
                'spec' => 'infektolog',
                'practise_name' => 'KBC Osijek',
                'practise_address' => 'Josipa Huttlera 4',
                'zip_code' => '31000',
                'city' => 'Osijek',
              ),
              array(
                'id' => '5',
                'name' => 'Josip Marković',
                'email' => 'josip@example.com',
                'password' => bcrypt('aaaaaaaa'),
                'phone_number' =>'25485784',
                'spec' => 'zubar',
                'practise_name' => 'KBC Osijek',
                'practise_address' => 'Josipa Huttlera 4',
                'zip_code' => '31000',
                'city' => 'Osijek',
              ),
              array(
                'id' => '6',
                'name' => 'Tin Marković',
                'email' => 'tin@example.com',
                'password' => bcrypt('aaaaaaaa'),
                'phone_number' =>'25485784',
                'spec' => 'infektolog',
                'practise_name' => 'KBC Osijek',
                'practise_address' => 'Josipa Huttlera 4',
                'zip_code' => '31000',
                'city' => 'Osijek',
              ),
            
            ));
        }
    }