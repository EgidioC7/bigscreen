@extends('layouts.admin')


@section('content')

@foreach($user_surveys as $user_survey)
    <table class="table table-bordered">
    <thead>
        <tr>
        <th scope="col">Numéro de la question</th>
        <th scope="col">Corps de la question</th>
        <th scope="col">Réponse</th>
        </tr>
    </thead>
    <tbody>
    @foreach($user_survey->answer as $data )
            <tr>
                <th scope="row">{{$data->question_id}}</th>
                <td>{{$data->getQuestionTitle()}}</td>
                <td>{{$data->value}}</td>
            </tr>
    @endforeach
    </tbody>
</table>

@endforeach

@endsection