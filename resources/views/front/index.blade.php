@extends('layouts.master')

@section('content')
@include('front.partials.flash')
<div class="row">
    @foreach($surveys as $survey)

    <div class="col-md-6 mb-5">
        <div class="card card-white h-100">
            <div class="card-body">
                <h2 class="card-title">Sondage {{$survey->name}}</h2>
            </div>
            <div class="card-footer">
                <a href="{{url('/',$survey->name)}}" class="btn btn-primary btn-sm">Accéder au sondage</a>
            </div>
        </div>
    </div>

    @endforeach
</div>
@endsection