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
              'name' => 'Matej Jukić',
              'email' => 'matej@example.com',
              'password' => bcrypt('aaaaaaaa'),
              'phone_number' =>'0958748562',
              'spec' => 'zubar',
              'practise_name' => 'KBC Osijek',
              'practise_address' => 'Josipa Huttlera 4',
              'zip_code' => '31000',
              'city' => 'Osijek',
            ),

            array(
              'id' => '2',
              'name' => 'Karlo Petrović',
              'email' => 'karlo@example.com',
              'password' => bcrypt('aaaaaaaa'),
              'phone_number' =>'0984512474',
              'spec' => 'kirurg',
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
                'phone_number' =>'0912547856',
                'spec' => 'infektolog',
                'practise_name' => 'KBC Osijek',
                'practise_address' => 'Josipa Huttlera 4',
                'zip_code' => '31000',
                'city' => 'Osijek',
              ),
              array(
                'id' => '4',
                'name' => 'Tin Marković',
                'email' => 'tin@example.com',
                'password' => bcrypt('aaaaaaaa'),
                'phone_number' =>'0925478596',
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
                'phone_number' =>'0984579321',
                'spec' => 'zubar',
                'practise_name' => 'KBC Osijek',
                'practise_address' => 'Josipa Huttlera 4',
                'zip_code' => '31000',
                'city' => 'Osijek',
              ),
              array(
                'id' => '6',
                'name' => 'Mirko Marković',
                'email' => 'mirko@example.com',
                'password' => bcrypt('aaaaaaaa'),
                'phone_number' =>'0957843214',
                'spec' => 'infektolog',
                'practise_name' => 'KBC Osijek',
                'practise_address' => 'Josipa Huttlera 4',
                'zip_code' => '31000',
                'city' => 'Osijek',
              ),

              array(
                'id' => '7',
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
              'id' => '8',
              'name' => 'Dino Perković',
              'email' => 'dino@example.com',
              'password' => bcrypt('aaaaaaaa'),
              'phone_number' =>'0954123457',
              'spec' => 'neurokirurg',
              'practise_name' => 'KBC Osijek',
              'practise_address' => 'Josipa Huttlera 4',
              'zip_code' => '31000',
              'city' => 'Osijek',
          ),

          array(
            'id' => '9',
            'name' => 'Hrvoje Perković',
            'email' => 'hrvoje@example.com',
            'password' => bcrypt('aaaaaaaa'),
            'phone_number' =>'0985456321',
            'spec' => 'dermatolog',
            'practise_name' => 'KBC Osijek',
            'practise_address' => 'Josipa Huttlera 4',
            'zip_code' => '31000',
            'city' => 'Osijek',
        ),

        array(
          'id' => '10',
          'name' => 'Mate Horvat',
          'email' => 'mate@example.com',
          'password' => bcrypt('aaaaaaaa'),
          'phone_number' =>'0985456321',
          'spec' => 'ortoped',
          'practise_name' => 'KBC Osijek',
          'practise_address' => 'Josipa Huttlera 4',
          'zip_code' => '31000',
          'city' => 'Osijek',
      ),

      array(
        'id' => '11',
        'name' => 'Mislav Klarić',
        'email' => 'mislav@example.com',
        'password' => bcrypt('aaaaaaaa'),
        'phone_number' =>'0985456321',
        'spec' => 'neurolog',
        'practise_name' => 'KBC Osijek',
        'practise_address' => 'Josipa Huttlera 4',
        'zip_code' => '31000',
        'city' => 'Osijek',
    ),
            
            ));
        }
    }