<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserSurvey;

class AnswerController extends Controller
{
    public function index(){
        $user_surveys = UserSurvey::with('answer')->get();

        return view('back.answers.index', ['user_surveys' => $user_surveys]);
    }
}
