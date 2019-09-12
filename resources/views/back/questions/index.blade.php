@extends('layouts.admin')


@section('content')

@foreach($surveys as $survey)
    <table class="table table-bordered">
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

@endforeach

@endsection