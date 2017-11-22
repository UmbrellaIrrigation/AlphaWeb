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
            'name' => 'PoopGroup'
        ]);
        DB::table('user_groups')->insert([
            'id'=>'33cfb362-5be6-4a80-997f-724092a1452f',
            'name'=>'ChildGroup',
            'parent_id'=>'8fe97bcc-fe0b-40d8-aed2-6d632785e533'
        ]);
        DB::table('user_to_group')->insert([
            'user_id' => 'dca898f6-20e6-45d6-bd54-560dc77e4243',
            'user_group_id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e533'
        ]);
    }
}
