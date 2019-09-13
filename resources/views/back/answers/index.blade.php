@extends('layouts.admin')


@section('content')

<div id="accordion">
    @foreach($user_surveys as $user_survey)
    <div class="card">
        <div class="card-header" id="heading{{$user_survey->id}}">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$user_survey->id}}"
                    aria-expanded="true" aria-controls="collapse{{$user_survey->id}}">
                    Utlisateur : <strong>{{$user_survey->email}} - {{$user_survey->created_at}}</strong>
                </button>
            </h5>
        </div>

        <div id="collapse{{$user_survey->id}}" class="collapse show" aria-labelledby="heading{{$user_survey->id}}"
            data-parent="#accordion">
            <div class="card-body">
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
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection