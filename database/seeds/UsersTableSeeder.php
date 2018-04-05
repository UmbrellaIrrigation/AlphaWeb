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
          'description' => 'The god admin',
          'remember_token' => str_random(10),
          'permission'=> 3,
          'verified'=> 1
        ]);
        DB::table('users')->insert([
          'id'=> '90f8b5d6-c284-4da3-a251-17e4d9be0061',
          'name' => 'rbilemjian',
          'email' => 'rbilemjian@my.csun.edu',
          'password' => bcrypt('secret'),
          'description' => 'Pretty cool guy',
          'remember_token' => str_random(10),
          'permission'=> 2
        ]);
        DB::table('users')->insert([
          'id'=> '3c825a1b-7e42-4aad-a614-07fab8fe99ff',
          'name' => 'guest',
          'email' => 'guest@my.csun.edu',
          'password' => bcrypt('secret'),
          'description' => 'Decent guy',
          'remember_token' => str_random(10)
        ]);



        DB::table('users')->insert([
          'id'=> '3c825a1b-7e42-4aad-a614-07fab8fe99fa',
          'name' => 'adminsub',
          'email' => 'guest1@my.csun.edu',
          'password' => bcrypt('secret'),
          'description' => 'Decent guy',
          'remember_token' => str_random(10)
        ]);

        DB::table('users')->insert([
          'id'=> '3c825a1b-7e42-4aad-a614-07fab8fe99fb',
          'name' => 'adminsubsub',
          'email' => 'guest2@my.csun.edu',
          'password' => bcrypt('secret'),
          'description' => 'Decent guy',
          'remember_token' => str_random(10)
        ]);

        DB::table('users')->insert([
          'id'=> '3c825a1b-7e42-4aad-a614-07fab8fe99fc',
          'name' => 'employee',
          'email' => 'guest3@my.csun.edu',
          'password' => bcrypt('secret'),
          'description' => 'Decent guy',
          'remember_token' => str_random(10)
        ]);

        DB::table('users')->insert([
          'id'=> '3c825a1b-7e42-4aad-a614-07fab8fe99fd',
          'name' => 'employeesub',
          'email' => 'guest4@my.csun.edu',
          'password' => bcrypt('secret'),
          'description' => 'Decent guy',
          'remember_token' => str_random(10)
        ]);

        DB::table('users')->insert([
          'id'=> '3c825a1b-7e42-4aad-a614-07fab8fe99fe',
          'name' => 'employeesubsub',
          'email' => 'guest5@my.csun.edu',
          'password' => bcrypt('secret'),
          'description' => 'Decent guy',
          'remember_token' => str_random(10)
        ]);

        DB::table('users')->insert([
          'id'=> '3c825a1b-7e42-4aad-a614-07fab8fe99fg',
          'name' => 'guest',
          'email' => 'guest6@my.csun.edu',
          'password' => bcrypt('secret'),
          'description' => 'Decent guy',
          'remember_token' => str_random(10)
        ]);

        DB::table('users')->insert([
          'id'=> '3c825a1b-7e42-4aad-a614-07fab8fe99fh',
          'name' => 'guestsub',
          'email' => 'guest7@my.csun.edu',
          'password' => bcrypt('secret'),
          'description' => 'Decent guy',
          'remember_token' => str_random(10)
        ]);

        DB::table('users')->insert([
          'id'=> '3c825a1b-7e42-4aad-a614-07fab8fe99fi',
          'name' => 'guestsubsub',
          'email' => 'guest8@my.csun.edu',
          'password' => bcrypt('secret'),
          'description' => 'Decent guy',
          'remember_token' => str_random(10)
        ]);


        DB::table('employee_to_guest')->insert([
            'employee_id'=> '90f8b5d6-c284-4da3-a251-17e4d9be0061',
            'guest_id'=> '3c825a1b-7e42-4aad-a614-07fab8fe99ff'
        ]);
        DB::table('guest_to_employee')->insert([
            'employee_id'=> '90f8b5d6-c284-4da3-a251-17e4d9be0061',
            'guest_id'=> '3c825a1b-7e42-4aad-a614-07fab8fe99ff'
        ]);

        DB::table('verify_users')->insert([
            'user_id'=>'dca898f6-20e6-45d6-bd54-560dc77e4243',
            'token'=>'58395766327c473ec096f68d32e2051f863ae6d5'

        ]);
    }
}
