<?php

use Illuminate\Database\Seeder;

class SurveyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('surveys')->insert(
            [
                'name' => 'first',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'second',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }
}
