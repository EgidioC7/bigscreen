@extends('layouts.admin')

@section('content')
<div class="row">
@foreach($charts as $chart )
<div class="col-sm-6">
<p class="text-white">{{$questions_title[$loop->iteration]}}</p>
    {!! $chart->render() !!}
</div>
@endforeach
</div>

@endsection