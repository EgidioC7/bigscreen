@extends('layouts.master')

@section('content')

    <p class="h1 mb-4">Contact us</p>

    <p>Voici les réponses de votre formulaire</p>

    <table class="table table-bordered">
    <thead>
        <tr>
        <th scope="col">Numéro de la question</th>
        <th scope="col">Questions</th>
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