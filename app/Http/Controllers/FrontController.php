<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\UserSurvey;
use App\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    public function index()
    {
        $survey = Survey::all();
        if(count($survey) === 1){
            return $this->survey(reset($survey)->id);
        }

        return view('front.index', ['surveys' => $survey]);
    }

    public function survey($data_survey){

        if(intval($data_survey)){
            $survey = Survey::find($data_survey);
        } else{
            $survey = Survey::where('name', $data_survey)->first();
        }

        if(empty($survey)){
            return redirect('/');
        }
      
        $questions = Question::where('survey_id', $survey->id)->get();

        return view('front.survey', ['questions' => $questions, 'survey' => $survey]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'question_1' => 'required|email',
            'question_2' => 'required|numeric|between:0,99.99',
            'question_3' => 'required',
            'question_4' => 'required',
            'question_5' => 'required',
            'question_6' => 'required',
            'question_7' => 'required',
            'question_8' => 'required',
            'question_9' => 'required',
            'question_10' => 'required',
            'question_11' => 'required',
            'question_12' => 'required',
            'question_13' => 'required',
            'question_14' => 'required',
            'question_15' => 'required',
            'question_16' => 'required',
            'question_17' => 'required',
            'question_18' => 'required',
            'question_19' => 'required',
            'question_20' => 'required',
        ]);

        if (UserSurvey::whereEmail($request->question_1)->exists()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors(['question_1' => 'Il existe déjà un utilisateur avec la même adresse mail']);
        }

        $email_user = $request->question_1;
        $survey_id = $request->survey_id;
        $new_user = new UserSurvey();
        $new_user->email = $email_user;
        $new_user->link = Str::uuid($email_user)->toString();
        $new_user->survey_id = $survey_id;
        $new_user->save();

        foreach ($request->all() as $key => $value) {
            if ($key === '_token' || $key === 'survey_id') {
                continue;
            } else {
                $key = str_replace('question_', '', $key);
                Answer::create([
                    'question_id' => $key,
                    'value' => $value,
                    'user_survey_id' => $new_user->id,
                ]);

            }
        }
        return redirect('/')->with('success', $new_user->link);
    }

    public function anwser($link)
    {

        $user = UserSurvey::where('link', $link)->first();

        if (empty($user)) {
            return redirect('/');
        }

        $date = new \DateTime($user->created_at);
        $date_time = $date->format('d-m-Y à H:i:s');

        $answers = Answer::where('user_survey_id', $user->id)->get();

        return view('front.show', ['answers' => $answers, 'user_date' => $date_time]);
    }
}