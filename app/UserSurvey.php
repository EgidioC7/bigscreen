<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSurvey extends Model
{
    protected $fillable = [
         'email', 'link', 'survey_id'
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
    
    public function answer(){
        return $this->hasMany(Answer::class);
    }
}
