@extends('layouts.master')

@section('content')
<div id="accordion">
    @foreach($surveys as $survey)
    <div class="card space">

        <div class="card-header" id="heading{{$survey->id}}">
            <h5 class="mb-0 white">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$survey->id}}"
                    aria-expanded="true" aria-controls="collapse{{$survey->id}}">
                    Sondage : <strong>{{$survey->name}} - {{$survey->created_at}}</strong>
                </button>
            </h5>
        </div>

        <div id="collapse{{$survey->id}}" class="collapse show" aria-labelledby="heading{{$survey->id}}"
            data-parent="#accordion">
            <div class="card-body">
                <table class="white table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Numéro de la question</th>
                            <th scope="col">Corps de la question</th>
                            <th scope="col">Type de question</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($survey->question as $data )
                        <tr>
                            <th scope="row">{{$data->id}}</th>
                            <td>{{$data->title}}</td>
                            <td>{{$data->question_type}}</td>
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