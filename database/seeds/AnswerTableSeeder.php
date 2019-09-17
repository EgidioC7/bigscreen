<?php

use Illuminate\Database\Seeder;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 10) as $user_survey_id) {

            foreach (range(2, 20) as $i) {

                switch ($i) {

                    case 2:
                        $value = rand(10, 80);
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $user_survey_id,
                            'value' => $value,
                            'created_at' => now()
                        ]);
                        break;

                    case 3:
                        $choice = ['Homme', 'Femme', 'Préfère ne pas répondre'];
                        $index = array_rand($choice, 1);
                        $value = $choice[$index];
                        
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $user_survey_id,
                            'value' => $value,
                            'created_at' => now()
                        ]);
                        break;

                    case 4:
                        $value = rand(1, 5);
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $user_survey_id,
                            'value' => $value,
                            'created_at' => now()
                        ]);
                        break;

                    case 5:
                        $value = "Développeur";
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $user_survey_id,
                            'value' => $value,
                            'created_at' => now()
                        ]);
                        break;

                    case 6:
                        $choice = ['Occulus Rift/s', 'HTC Vive', 'Windows Mixed Reality', 'PSVR'];
                        $index = array_rand($choice, 1);
                        $value = $choice[$index];

                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $user_survey_id,
                            'value' => $value,
                            'created_at' => now()
                        ]);
                        break;

                    case 7:
                        $choice = ['SteamVR', 'Occulus Store', 'Viveport', 'Playstation VR', 'Google Play', 'Windows Store'];
                        $index = array_rand($choice, 1);
                        $value = $choice[$index];
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $user_survey_id,
                            'value' => $value,
                            'created_at' => now()
                        ]);
                        break;

                    case 8:
                        $choice = ['Occulus Quest', 'Occulus Go', 'HTC Vive Pro', 'Autre', 'Aucun'];
                        $index = array_rand($choice, 1);
                        $value = $choice[$index];
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $user_survey_id,
                            'value' => $value,
                            'created_at' => now()
                        ]);
                        break;

                    case 9:
                        $value = rand(1, 5);
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $user_survey_id,
                            'value' => $value,
                            'created_at' => now()
                        ]);
                        break;

                    case 10:
                        $choice = ['regarder des émissions TV en direct', 'regarder des films', 'jouer en solo', 'jouer en team'];
                        $index = array_rand($choice, 1);
                        $value = $choice[$index];
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $user_survey_id,
                            'value' => $value,
                            'created_at' => now()
                        ]);
                        break;

                    case 11:
                        $value = rand(1, 5);
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $user_survey_id,
                            'value' => $value,
                            'created_at' => now()
                        ]);
                        break;

                    case 12:
                        $value = rand(1, 5);
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $user_survey_id,
                            'value' => $value,
                            'created_at' => now()
                        ]);
                        break;

                    case 13:
                        $value = rand(1, 5);
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $user_survey_id,
                            'value' => $value,
                            'created_at' => now()
                        ]);
                        break;

                    case 14:
                        $value = rand(1, 5);
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $user_survey_id,
                            'value' => $value,
                            'created_at' => now()
                        ]);
                        break;

                    case 15:
                        $value = rand(1, 5);
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $user_survey_id,
                            'value' => $value,
                            'created_at' => now()
                        ]);
                        break;

                    case 16:
                        $choice = ['oui', 'non'];
                        $index = array_rand($choice, 1);
                        $value = $choice[$index];
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $user_survey_id,
                            'value' => $value,
                            'created_at' => now()
                        ]);
                        break;

                    case 17:
                        $choice = ['oui', 'non'];
                        $index = array_rand($choice, 1);
                        $value = $choice[$index];
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $user_survey_id,
                            'value' => $value,
                            'created_at' => now()
                        ]);
                        break;

                    case 18:
                        $choice = ['oui', 'non'];
                        $index = array_rand($choice, 1);
                        $value = $choice[$index];
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $user_survey_id,
                            'value' => $value,
                            'created_at' => now()
                        ]);
                        break;

                    case 19:
                        $choice = ['oui', 'non'];
                        $index = array_rand($choice, 1);
                        $value = $choice[$index];
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $user_survey_id,
                            'value' => $value,
                            'created_at' => now()
                        ]);
                        break;

                    case 20:
                        $value = "test";
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $user_survey_id,
                            'value' => $value,
                            'created_at' => now()
                        ]);
                        break;
                }
            }
        }
    }
}
