<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['value', 'question_id', 'user_survey_id'];

    public function user()
    {
        return $this->belongsTo(UserSurvey::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
