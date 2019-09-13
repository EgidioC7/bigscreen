@extends('layouts.master')

@section('content')

<p class="text-white text-center font-weight-bold text-uppercase px-3 small py-4 mb-0">Vous trouverez ci-dessous les réponses que vous avez apportées à notre sondage le {{$user_date}} </p>

<table class="white table table-bordered">
    <thead>
        <tr>
            <th scope="col">Numéro de la question</th>
            <th scope="col">Corps de la question</th>
            <th scope="col">Réponses</th>
        </tr>
    </thead>
    <tbody>
        @foreach($answers as $answer )
        <tr>
            <th scope="row">{{$answer->question_id}}</th>
            <td>{{$answer->getQuestionTitle()}}</td>
            <td>{{$answer->value}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection