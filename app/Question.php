<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title', 'question_type', 'choice'
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
