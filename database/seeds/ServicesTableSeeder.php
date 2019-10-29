<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
        {
            DB::table('services')->insert(array(
                
                array(
            
                  'id' => '1',
                  'doctor_id' => '1',
                  'description' => 'Opći pregled',
                  'duration' => '1',
                ),

                array(

                  'id' => '2',
                  'doctor_id' => '1',
                  'description' => 'Skidanje kamenca',
                  'duration' => '1',
                ),

                array(

                    'id' => '3',
                    'doctor_id' => '1',
                    'description' => 'Stavljanje umjetnog zuba',
                    'duration' => '2',
                  ),

                  array(

                    'id' => '4',
                    'doctor_id' => '2',
                    'description' => 'Opći pregled',
                    'duration' => '1',
                  ),

                  array(

                    'id' => '5',
                    'doctor_id' => '3',
                    'description' => 'Opći pregled',
                    'duration' => '1',
                  ),

                  array(

                    'id' => '6',
                    'doctor_id' => '4',
                    'description' => 'Opći pregled',
                    'duration' => '1',
                  ),

                  array(

                    'id' => '7',
                    'doctor_id' => '5',
                    'description' => 'Opći pregled',
                    'duration' => '1',
                  ),

                  array(

                    'id' => '8',
                    'doctor_id' => '6',
                    'description' => 'Opći pregled',
                    'duration' => '1',
                  ),

                  array(

                    'id' => '9',
                    'doctor_id' => '7',
                    'description' => 'Opći pregled',
                    'duration' => '1',
                  ),

                  array(

                    'id' => '10',
                    'doctor_id' => '8',
                    'description' => 'Opći pregled',
                    'duration' => '1',
                  ),
            ));
              
    }
}
