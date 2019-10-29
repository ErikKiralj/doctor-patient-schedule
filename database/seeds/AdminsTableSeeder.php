<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

        public function run()
        {
            DB::table('admins')->insert(array(array(
            
                  'id' => '1',
                  'name' => 'Admin Admin',
                  'email' => 'admin@example.com',
                  'password' => bcrypt('admin'),
                ),
            ));
              
    }
}
