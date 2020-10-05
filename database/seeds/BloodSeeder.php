<?php

use Illuminate\Database\Seeder;

class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloods')->insert([
            'blood_group' => 'A+',
        ]);

        DB::table('bloods')->insert([
            'blood_group' => 'A-',
        ]);

        DB::table('bloods')->insert([
            'blood_group' => 'B+',
        ]);

        DB::table('bloods')->insert([
            'blood_group' => 'B-',
        ]);

        DB::table('bloods')->insert([
            'blood_group' => 'AB+',
        ]);

        DB::table('bloods')->insert([
            'blood_group' => 'AB-',
        ]);

        DB::table('bloods')->insert([
            'blood_group' => 'O+',
        ]);
        
        DB::table('bloods')->insert([
            'blood_group' => 'O-',
        ]);
    }
    
}
