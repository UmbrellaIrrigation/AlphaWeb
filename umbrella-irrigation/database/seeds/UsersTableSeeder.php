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
        DB::table('users')->delete();
        DB::table('users')->insert([
          'id'=> 'dca898f6-20e6-45d6-bd54-560dc77e4243',
          'name' => 'admin',
          'email' => 'admin@my.csun.edu',
          'password' => bcrypt('secret'),
          'remember_token' => str_random(10),
          'permission'=> 3
        ]);
        DB::table('users')->insert([
          'id'=> '90f8b5d6-c284-4da3-a251-17e4d9be0061',
          'name' => 'rbilemjian',
          'email' => 'rbilemjian@my.csun.edu',
          'password' => bcrypt('secret'),
          'remember_token' => str_random(10)
        ]);
    }
}