@extends('layouts.master')

@section('content')
    <div class="row">
        @foreach($charts as $chart )
            <div class="col-xl-6 col-lg-12">
                <div class="card card-white">
                    <div class="card-header">
                        <h5 class="card-title">{{$questions_title[$loop->iteration]}}</h5>
                    </div>
                    <div class="card-body">
                        {!! $chart->render() !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection