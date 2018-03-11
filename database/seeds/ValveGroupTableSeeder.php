<?php

use Illuminate\Database\Seeder;

class ValveGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('valve_groups')->delete();
        DB::table('valve_to_group')->delete();

        DB::table('valve_groups')->insert([
            'id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e533',
            'name' => 'ValveAGroup'
        ]);
        DB::table('valve_groups')->insert([
            'id'=>'33cfb362-5be6-4a80-997f-724092a1452f',
            'name'=>'ValveASubGroup',
            'parent_valve_group'=>'8fe97bcc-fe0b-40d8-aed2-6d632785e533'
        ]);
        DB::table('valve_groups')->insert([
            'id'=>'c7a3ee9b-3f78-413d-85db-2e29af64a9ac',
            'name'=>'ValveASubSubGroup',
            'parent_valve_group'=>'33cfb362-5be6-4a80-997f-724092a1452f'
        ]);


        DB::table('valve_groups')->insert([
            'id' => 'fjiajr0u19023840921',
            'name' => 'ValveBGroup'
        ]);
        DB::table('valve_groups')->insert([
            'id'=>'fjaioejr1902831a',
            'name'=>'ValveBSubGroup',
            'parent_valve_group'=>'fjiajr0u19023840921'
        ]);
        DB::table('valve_groups')->insert([
            'id'=>'mcikzjieuaij18341fa',
            'name'=>'ValveBSubSubGroup',
            'parent_valve_group'=>'fjaioejr1902831a'
        ]);


        DB::table('valve_groups')->insert([
            'id' => 'fjaoie193nfoa',
            'name' => 'ValveCGroup'
        ]);
        DB::table('valve_groups')->insert([
            'id'=>'90134aoiefjafa9',
            'name'=>'ValveCSubGroup',
            'parent_valve_group'=>'fjaoie193nfoa'
        ]);
        DB::table('valve_groups')->insert([
            'id'=>'fjaioej0190amiz',
            'name'=>'ValveCSubSubGroup',
            'parent_valve_group'=>'90134aoiefjafa9'
        ]);


        DB::table('valve_to_group')->insert([
            'valve_id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e533',
            'valve_group_id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e533'
        ]);
        DB::table('valve_to_group')->insert([
            'valve_id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e534',
            'valve_group_id' => '33cfb362-5be6-4a80-997f-724092a1452f'
        ]);
        DB::table('valve_to_group')->insert([
            'valve_id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e535',
            'valve_group_id' => 'c7a3ee9b-3f78-413d-85db-2e29af64a9ac'
        ]);


        DB::table('valve_to_group')->insert([
            'valve_id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e536',
            'valve_group_id' => 'fjiajr0u19023840921'
        ]);
        DB::table('valve_to_group')->insert([
            'valve_id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e537',
            'valve_group_id' => 'fjaioejr1902831a'
        ]);
        DB::table('valve_to_group')->insert([
            'valve_id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e538',
            'valve_group_id' => 'mcikzjieuaij18341fa'
        ]);


        DB::table('valve_to_group')->insert([
            'valve_id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e539',
            'valve_group_id' => 'fjaoie193nfoa'
        ]);
        DB::table('valve_to_group')->insert([
            'valve_id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e540',
            'valve_group_id' => '90134aoiefjafa9'
        ]);
        DB::table('valve_to_group')->insert([
            'valve_id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e541',
            'valve_group_id' => 'fjaioej0190amiz'
        ]);


    }
}
