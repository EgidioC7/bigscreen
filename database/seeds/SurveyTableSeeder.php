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
        DB::table('surveys')->insert([
            [
                'name' => 'Sondage Bigscreen',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
