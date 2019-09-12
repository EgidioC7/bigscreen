<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;



class SurveyController extends Controller
{
    public function index(){

       $questions_title = [];

       $question_chart_6 = $this->pieChart(6);
       $pie_chart_6 = $question_chart_6['chart'];

       $question_chart_7 = $this->pieChart(7);
       $pie_chart_7 = $question_chart_7['chart'];

       $question_chart_10 = $this->pieChart(10);
       $pie_chart_10 = $question_chart_10['chart'];
      
     $questions_title = [
           '1' => $question_chart_6['title'], 
           '2' => $question_chart_7['title'], 
           '3' => $question_chart_10['title'] 
        ];

      //  $question_chart_10 = $this->radarChart(10);

        /*$chart_data =  [
            (   object)[
                    'chart' => compact('pie_chart_6'), 
                    'question_title' => $question_chart_6['title'] 
                ],
                (object)  [
                    'chart' => compact('pie_chart_7'), 
                    'question_title' => $question_chart_7['title'] 
                ],
                (object) [
                    'chart' => compact('pie_chart_10'), 
                    'question_title' => $question_chart_10['title'] 
                ],
            ];*/
    
    return view('back.home.index',["charts" => compact('pie_chart_6','pie_chart_7','pie_chart_10'), 'questions_title' => $questions_title ]);
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

        $chartjs = app()->chartjs
        ->name("question_$question_id")
        ->type('pie')
        ->size(['width' => 750, 'height' => 700])
        ->labels($pie_chart['label'])
        ->datasets([
            [
                'backgroundColor' => ['#FF6384', '#36A2EB'],
                'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                'data' => array_values($pie_chart['data'])
            ]
        ])
        ->options([]);

        $all_chart_data = ['chart' => $chartjs, 'title' => $question->title];

        return $all_chart_data;
    }

    public function radarChart(int $question_id){
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
        
        $chartjs = app()->chartjs
        ->name("question_$question_id")
        ->type('radar')
        ->size(['width' => 750, 'height' => 700])
        ->labels()
        ->datasets([
            [
                "label" => "My First dataset",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [65, 59, 80, 81, 56, 55, 40],
            ],
            [
                "label" => "My Second dataset",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [12, 33, 44, 44, 55, 23, 40],
            ]
        ])
        ->options([]);

return view('example', compact('chartjs'));
        $all_chart_data = ['chart' => $chartjs, 'title' => $question->title];

        return $all_chart_data;
    }
}