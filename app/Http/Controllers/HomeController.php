<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\UserSurvey;
use App\Survey;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public $prefix_;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->prefix_ = request()->page ?? 'home';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions_title = [];

        $path_6 = 'chart6_' . $this->prefix_;
        $question_chart_6 = Cache::remember($path_6, 60 * 24, function () {
            return $this->pieChart(6);
        });
        $pie_chart_6 = $question_chart_6['chart'];
 
        $path_7 = 'chart7_' . $this->prefix_;;
        $question_chart_7 = Cache::remember($path_7, 60 * 24, function () {
            return $this->pieChart(7);
        });
        $pie_chart_7 = $question_chart_7['chart'];

        $path_10 = 'chart10_' . $this->prefix_;
        $question_chart_10 = Cache::remember($path_10, 60 * 24, function () {
            return $this->pieChart(10);
        });
        $pie_chart_10 = $question_chart_10['chart'];

        $path_11 = 'chart11_' . $this->prefix_;
        $question_chart_11 = Cache::remember($path_11, 60 * 24, function () {
            return $this->radarChart(['11','12','13','14','15']);
        });

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
        $path = 'survey_'.$this->prefix_;

        $survey = Cache::remember($path, 60 * 24, function () {
            return Survey::with('question')->get();
        });

        return view('back.questions.index', ['surveys' => $survey]);
    }

    public function show_answers(){

        $path = 'answer_'.$this->prefix_;

        $user_surveys = Cache::remember($path, 60 * 24, function () {
            return UserSurvey::with('answer.question')->get();
        });

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

        public function random_rgba(){
            $rgbColor = [];
 
            //Create a loop.
            foreach(['r', 'g', 'b','o'] as $color){
                if($color === 'o'){
                    $rgbColor[$color] = floatVal('0.'.rand(1, 99));
                }
                else{
                //Generate a random number between 0 and 255.
                $rgbColor[$color] = mt_rand(0, 255);
                }
            }
            return 'rgba('.implode(",",$rgbColor).')';
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

    public function radarChart(array $question_id){
        $all_chart_data = [];
        $question = Question::find($question_id);
        $answers = Answer::with('question')->whereIn('question_id', $question_id)->get();
  
        $radar_chart = [];

        $radar_data = [];

        for($i=1; $i<=5; $i++){
            $radar_chart['label'][] = $i;
        }
       
        for($i = reset($question_id); $i <= end($question_id); $i++){
            foreach($radar_chart['label'] as $label){
                $radar_chart['data'][$i][$label] = 0;
            }
        }
        
        for($i = reset($question_id); $i <= end($question_id); $i++){
            foreach($answers as $answer){
                if($answer->question->id === (int) $i){
                    $search_value = array_search($answer->value, $radar_chart['label']);
                    if($search_value !== false){
                        $radar_chart['data'][$i][$answer->value] += 1;
                    }
                }
            }
            $random_rgba = $this->random_rgba();

            $radar_data[] =  [
                "label" => "Question $i",
                'borderColor' => "$random_rgba",
                "pointBorderColor" => "$random_rgba",
                "pointBackgroundColor" => "$random_rgba",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => array_values($radar_chart['data'][$i])
            ];
        }

        $chartjs = app()->chartjs
        ->name("question_radar")
        ->type('radar')
        ->size(['width' => 750, 'height' => 700])
        ->labels($radar_chart['label'])
        ->datasets($radar_data)
        ->optionsRaw([
            'scale' => [
                'ticks' => [
                  'beginAtZero' => true,
                  'min' => 0,
                  'stepSize'=> 1
                ],
                'pointLabels' => [
                  'fontSize' => 18,
                  'fontColor' => "#fafafa"
            ]
                ],
              'legend' => [
                'position' => 'left',
                'labels' => [
                    'fontColor' => '#fafafa'
                ]
              ]
              ]);

        $all_chart_data = ['chart' => $chartjs, 'title' => 'Question de 11 à 15'];
    
        return $all_chart_data;
    }

}