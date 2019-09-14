<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\UserSurvey;
use App\Survey;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions_title = [];

        $question_chart_6 = $this->pieChart(6);
        $pie_chart_6 = $question_chart_6['chart'];
 
        $question_chart_7 = $this->pieChart(7);
        $pie_chart_7 = $question_chart_7['chart'];
 
        $question_chart_10 = $this->pieChart(10);
        $pie_chart_10 = $question_chart_10['chart'];
 
        $question_chart_11 = $this->radarChart(11);
        $pie_chart_11 = $question_chart_11['chart'];
       
      $questions_title = [
            '1' => $question_chart_6['title'], 
            '2' => $question_chart_7['title'], 
            '3' => $question_chart_10['title'],
            '4' => $question_chart_11['title'],
         ];
     
          return view('back.home.index',["charts" => compact('pie_chart_6','pie_chart_7','pie_chart_10', 'pie_chart_11'), 'questions_title' => $questions_title ]); 
   
    }

    public function show_questions()
    {
        $survey = Survey::with('question')->get();

        return view('back.questions.index', ['surveys' => $survey]);
    }

    public function show_answers(){
        $user_surveys = UserSurvey::with('answer')->get();

        return view('back.answers.index', ['user_surveys' => $user_surveys]);
    }
    public function random_color($value){

        $random = [];

        for($i = 0; $i < $value; $i++) {
            $hex = '#';
    
  
            //Create a loop.
            foreach(array('r', 'g', 'b') as $color){
                //Random number between 0 and 255.
                $val = mt_rand(0, 255);
                //Convert the random number into a Hex value.
                $dechex = dechex($val);
                //Pad with a 0 if length is less than 2.
                if(strlen($dechex) < 2){
                    $dechex = "0" . $dechex;
                }
                //Concatenate
                $hex .= $dechex;
            }

              $random[$i] = $hex;
        }
        return $random;
        }

    public function pieChart(int $question_id){
        $all_chart_data = [];
        $question = Question::find($question_id);
        $answers = Answer::where('question_id', $question_id)->get();
        
        $pie_chart = [];
        $pie_chart['label'] = unserialize($question->choice);
       
        foreach($pie_chart['label'] as $label){
            $pie_chart['data'][$label] = 0;
        }
        
        foreach($answers as $answer){
        $search_value = array_search($answer->value, $pie_chart['label']);
            if($search_value !== false){
                $pie_chart['data'][$answer->value] += 1;
            }
        }

        $random_color = $this->random_color(count($pie_chart['data']));

        $chartjs = app()->chartjs
        ->name("question_$question_id")
        ->type('pie')
        ->size(['width' => 750, 'height' => 700])
        ->labels($pie_chart['label'])
        ->datasets([
            [
                'backgroundColor' => $random_color,
                'hoverBackgroundColor' => $random_color,
                'data' => array_values($pie_chart['data'])
            ]
        ])
        ->optionsRaw([
        'scale' => [
            'pointLabels' => [
              'fontSize' => 18
        ]
            ],
          'legend' => [
            'position' => 'left',
            'labels' => [
                'fontColor' => '#fafafa'
            ]
          ]
          ]);

        $all_chart_data = ['chart' => $chartjs, 'title' => $question->title];

        return $all_chart_data;
    }

    public function radarChart(int $question_id){
        $all_chart_data = [];
        $question = Question::find($question_id);
        $answers = Answer::where('question_id', $question_id)->get();
        
        $pie_chart = [];

        for($i=1; $i<=5; $i++){
            $pie_chart['label'][] = $i;
        }
       
        foreach($pie_chart['label'] as $label){
            $pie_chart['data'][$label] = 0;
        }
        
        foreach($answers as $answer){
        $search_value = array_search($answer->value, $pie_chart['label']);
            if($search_value !== false){
                $pie_chart['data'][$answer->value] += 1;
            }
        }

        $chartjs = app()->chartjs
        ->name("question_$question_id")
        ->type('radar')
        ->size(['width' => 750, 'height' => 700])
        ->labels($pie_chart['label'])
        ->datasets([
            [
                "label" => "Nombre de points",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => array_values($pie_chart['data'])
            ]
        ])
        ->optionsRaw([
            'scale' => [
                'ticks' => [
                  'beginAtZero' => true,
                  'min' => 0,
                  'stepSize'=> 1
                ],
                'pointLabels' => [
                  'fontSize' => 18
            ]
                ],
              'legend' => [
                'position' => 'left',
                'labels' => [
                    'fontColor' => '#fafafa'
                ]
              ]
              ]);

        $all_chart_data = ['chart' => $chartjs, 'title' => $question->title];

        return $all_chart_data;
    }

}