<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\UserSurvey;
use App\Answer;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    public function index(){
        $questions = Question::all();

        return view('front.index', ['questions' => $questions]);
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

      $email_user = $request->question_1;
      $survey_id = $request->survey_id;
      $user_exist = UserSurvey::where('email', $email_user )->where('survey_id',$survey_id)->first();
      if( is_null($user_exist) ){
        $new_user = new UserSurvey();
        $new_user->email = $email_user;
        $new_user->link =  Str::uuid($email_user)->toString();
        $new_user->survey_id = $survey_id;
        $new_user->save();
      }

      foreach($request->all() as $key => $value){
          if($key === '_token' || $key === 'survey_id' ){
              continue;
          }
          else{
                $key = str_replace('question_', '', $key);
                if(!empty($user_exist)){
                    $exist_answer = Answer::where('user_survey_id', $user_exist->id)->where('question_id',$key)->first();
                    $exist_answer->update(['value' => $value]);
                }
                else{
                    Answer::create([
                        'question_id' => $key,
                        'value' => $value,
                        'user_survey_id' => $new_user->id,
                    ]);
                }
          }
      }

      if(!is_null($user_exist)){
        return redirect('/')->with('success', $user_exist->link);
      }
      else{
        return redirect('/')->with('success', $new_user->link);
      }
    }

    public function anwser($link){

        $user = UserSurvey::where('link', $link)->first();

        if(empty($user)){
            return redirect('/');
        }

        $answers = Answer::where('user_survey_id', $user->id)->get();

        return view('front.show', ['answers' => $answers]);
    }
}