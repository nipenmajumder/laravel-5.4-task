<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'dept_name' => 'Science',
        ]);
        DB::table('departments')->insert([
            'dept_name' => 'Arts',
        ]);
        DB::table('departments')->insert([
            'dept_name' => 'Commerce',
        ]);

    }
}
