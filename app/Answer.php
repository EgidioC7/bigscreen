<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['value', 'question_id','user_survey_id'];

    public function scopeGetQuestionTitle(){

        return Question::find($this->question_id)->title;
    }
    public function user(){
        return $this->belongsTo(UserSurvey::class);
    }
}
