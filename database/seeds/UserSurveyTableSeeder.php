<?php

use Illuminate\Database\Seeder;

class UserSurveyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UserSurvey::class, 10)->create();
    }
}
