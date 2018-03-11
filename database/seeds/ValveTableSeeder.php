<?php

use Illuminate\Database\Seeder;

class ValveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('valves')->delete();

        DB::table('valves')->insert([
            'id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e533',
            'name' => 'valve1',
            'latitude' => 1, 
            'longitude' => 1,
            'min_flow_limit' => 1,
            'max_flow_limit' => 1,
            'curr_flow' => 1,
            'max_gpm' => 1,
            'min_voltage' => 1,
            'max_voltage' => 1,
            'curr_voltage' => 1,
            'nominal_flow_limit' => 1
        ]);
        DB::table('valves')->insert([
            'id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e534',
            'name' => 'valve2',
            'latitude' => 1, 
            'longitude' => 1,
            'min_flow_limit' => 1,
            'max_flow_limit' => 1,
            'curr_flow' => 1,
            'max_gpm' => 1,
            'min_voltage' => 1,
            'max_voltage' => 1,
            'curr_voltage' => 1,
            'nominal_flow_limit' => 1
        ]);
        DB::table('valves')->insert([
            'id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e535',
            'name' => 'valve3',
            'latitude' => 1, 
            'longitude' => 1,
            'min_flow_limit' => 1,
            'max_flow_limit' => 1,
            'curr_flow' => 1,
            'max_gpm' => 1,
            'min_voltage' => 1,
            'max_voltage' => 1,
            'curr_voltage' => 1,
            'nominal_flow_limit' => 1
        ]);
        DB::table('valves')->insert([
            'id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e536',
            'name' => 'valve4',
            'latitude' => 1, 
            'longitude' => 1,
            'min_flow_limit' => 1,
            'max_flow_limit' => 1,
            'curr_flow' => 1,
            'max_gpm' => 1,
            'min_voltage' => 1,
            'max_voltage' => 1,
            'curr_voltage' => 1,
            'nominal_flow_limit' => 1
        ]);
        DB::table('valves')->insert([
            'id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e537',
            'name' => 'valve5',
            'latitude' => 1, 
            'longitude' => 1,
            'min_flow_limit' => 1,
            'max_flow_limit' => 1,
            'curr_flow' => 1,
            'max_gpm' => 1,
            'min_voltage' => 1,
            'max_voltage' => 1,
            'curr_voltage' => 1,
            'nominal_flow_limit' => 1
        ]);
        DB::table('valves')->insert([
            'id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e538',
            'name' => 'valve6',
            'latitude' => 1, 
            'longitude' => 1,
            'min_flow_limit' => 1,
            'max_flow_limit' => 1,
            'curr_flow' => 1,
            'max_gpm' => 1,
            'min_voltage' => 1,
            'max_voltage' => 1,
            'curr_voltage' => 1,
            'nominal_flow_limit' => 1
        ]);
        DB::table('valves')->insert([
            'id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e539',
            'name' => 'valve7',
            'latitude' => 1, 
            'longitude' => 1,
            'min_flow_limit' => 1,
            'max_flow_limit' => 1,
            'curr_flow' => 1,
            'max_gpm' => 1,
            'min_voltage' => 1,
            'max_voltage' => 1,
            'curr_voltage' => 1,
            'nominal_flow_limit' => 1
        ]);
        DB::table('valves')->insert([
            'id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e540',
            'name' => 'valve8',
            'latitude' => 1, 
            'longitude' => 1,
            'min_flow_limit' => 1,
            'max_flow_limit' => 1,
            'curr_flow' => 1,
            'max_gpm' => 1,
            'min_voltage' => 1,
            'max_voltage' => 1,
            'curr_voltage' => 1,
            'nominal_flow_limit' => 1
        ]);
        DB::table('valves')->insert([
            'id' => '8fe97bcc-fe0b-40d8-aed2-6d632785e541',
            'name' => 'valve9',
            'latitude' => 1, 
            'longitude' => 1,
            'min_flow_limit' => 1,
            'max_flow_limit' => 1,
            'curr_flow' => 1,
            'max_gpm' => 1,
            'min_voltage' => 1,
            'max_voltage' => 1,
            'curr_voltage' => 1,
            'nominal_flow_limit' => 1
        ]);
        
    }
}
