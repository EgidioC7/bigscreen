<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public function answer()
    {
        return $this->hasMany(Answer::class);
    }

    public function usersurvey()
    {
        return $this->hasMany(UserSurvey::class);
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }
}
