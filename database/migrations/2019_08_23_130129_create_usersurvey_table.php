<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersurvey', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE'); 
            $table->unsignedInteger('survey_id')->nullable();
            $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('usersurvey_user_id_foreign');
        $table->dropColumn('user_id');
        $table->dropForeign('usersurvey_survey_id_foreign');
        $table->dropColumn('survey_id');
    }
}
