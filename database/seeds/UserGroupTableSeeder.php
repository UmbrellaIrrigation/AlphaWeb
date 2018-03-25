<?php

use Illuminate\Database\Seeder;

class UserGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_groups')->delete();
        DB::table('user_to_group')->delete();

        DB::table('user_groups')->insert([
            'id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e533',
            'name' => 'AdminGroup'
        ]);
        DB::table('user_groups')->insert([
            'id'=>'33cfb362-5be6-4a80-997f-724092a1452f',
            'name'=>'AdminSubGroup',
            'parent_id'=>'8fe97bcc-fe0b-40d8-aed2-6d632785e533'
        ]);
        DB::table('user_groups')->insert([
            'id'=>'c7a3ee9b-3f78-413d-85db-2e29af64a9ac',
            'name'=>'AdminSubSubGroup',
            'parent_id'=>'33cfb362-5be6-4a80-997f-724092a1452f'
        ]);


        DB::table('user_groups')->insert([
            'id' => 'fjiajr0u19023840921',
            'name' => 'EmployeeGroup'
        ]);
        DB::table('user_groups')->insert([
            'id'=>'fjaioejr1902831a',
            'name'=>'EmployeeSubGroup',
            'parent_id'=>'fjiajr0u19023840921'
        ]);
        DB::table('user_groups')->insert([
            'id'=>'mcikzjieuaij18341fa',
            'name'=>'EmployeeSubSubGroup',
            'parent_id'=>'fjaioejr1902831a'
        ]);


        DB::table('user_groups')->insert([
            'id' => 'fjaoie193nfoa',
            'name' => 'GuestGroup'
        ]);
        DB::table('user_groups')->insert([
            'id'=>'90134aoiefjafa9',
            'name'=>'GuestSubGroup',
            'parent_id'=>'fjaoie193nfoa'
        ]);
        DB::table('user_groups')->insert([
            'id'=>'fjaioej0190amiz',
            'name'=>'GuestSubSubGroup',
            'parent_id'=>'90134aoiefjafa9'
        ]);


        DB::table('user_to_group')->insert([
            'user_id' => 'dca898f6-20e6-45d6-bd54-560dc77e4243',
            'user_group_id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e533'
        ]);
        DB::table('user_to_group')->insert([
            'user_id' => '3c825a1b-7e42-4aad-a614-07fab8fe99fa',
            'user_group_id' => '33cfb362-5be6-4a80-997f-724092a1452f'
        ]);
        DB::table('user_to_group')->insert([
            'user_id' => '3c825a1b-7e42-4aad-a614-07fab8fe99fb',
            'user_group_id' => 'c7a3ee9b-3f78-413d-85db-2e29af64a9ac'
        ]);

        DB::table('user_to_group')->insert([
            'user_id' => '3c825a1b-7e42-4aad-a614-07fab8fe99fc',
            'user_group_id' => 'fjiajr0u19023840921'
        ]);
        DB::table('user_to_group')->insert([
            'user_id' => '3c825a1b-7e42-4aad-a614-07fab8fe99fd',
            'user_group_id' => 'fjaioejr1902831a'
        ]);
        DB::table('user_to_group')->insert([
            'user_id' => '3c825a1b-7e42-4aad-a614-07fab8fe99fe',
            'user_group_id' => 'mcikzjieuaij18341fa'
        ]);

        DB::table('user_to_group')->insert([
            'user_id' => '3c825a1b-7e42-4aad-a614-07fab8fe99fg',
            'user_group_id' => 'fjaoie193nfoa'
        ]);
        DB::table('user_to_group')->insert([
            'user_id' => '3c825a1b-7e42-4aad-a614-07fab8fe99fh',
            'user_group_id' => '90134aoiefjafa9'
        ]);
        DB::table('user_to_group')->insert([
            'user_id' => '3c825a1b-7e42-4aad-a614-07fab8fe99fi',
            'user_group_id' => 'fjaioej0190amiz'
        ]);

    }
}
