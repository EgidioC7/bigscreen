@extends('layouts.master')

@section('content')

@include('front.partials.flash')

<!-- Default form contact -->
<form class="text-center border border-light p-5" method="POST" action="{{action('FrontController@store')}}">

    {{ csrf_field() }}

    <p class="h1 mb-4">Contact us</p>

    <p>Merci de répondre à toute les questions et de valider le formulaire en bas de page</p>

    @foreach($questions as $question )

    <div class="form-group">
        <h4>Question {{$question->id}}/{{$question->count()}}</h4>
        <label for="question_{{$question->id}}">{{$question->title}}</label>
        @if($question->question_type === 'text')
            @if($question->id === 1)
                <input type="email" name="question_{{$question->id}}" id="question_{{$question->id}}" class="form-control mb-4" placeholder="E-mail"
                required value="{{old('question_'.$question->id)}}">
               @if($errors->has('question_'.$question->id)) <span class="error">{{$errors->first("question_".$question->id)}} @endif
            @elseif($question->id === 2)
                <input type="number" name="question_{{$question->id}}" id="question_{{$question->id}}" class="form-control mb-4"
                placeholder="{{$question->title}}" value="{{old('question_'.$question->id)}}" required>
                @if($errors->has('question_'.$question->id)) <span class="error">{{$errors->first("question_".$question->id)}}</span>@endif
            @elseif($question->id === 20)
                <textarea class="form-control" name="question_{{$question->id}}" id="question_{{$question->id}}" rows="3" required>{{old('question_'.$question->id)}}</textarea>
                @if($errors->has('question_'.$question->id)) <span class="error">{{$errors->first("question_".$question->id)}}</span>@endif
            @else
            <input type="text" name="question_{{$question->id}}" id="question_{{$question->id}}" class="form-control mb-4"
                placeholder="{{$question->title}}" required value="{{old('question_'.$question->id)}}">
                @if($errors->has('question_'.$question->id)) <span class="error">{{$errors->first("question_".$question->id)}}</span>@endif
            @endif
        @elseif ($question->question_type === 'selector' )
            <select id="question_{{$question->id}}" name="question_{{$question->id}}" class="browser-default custom-select mb-4"
                required>
                <option value="0" disabled {{ is_null(old("question_".$question->id)) ? 'selected' : '' }}>-- Choisir --</option>
                @foreach( unserialize($question->choice) as $choice)
                <option value="{{$choice}}" {{ (old("question_".$question->id) === $choice ) ? 'selected' : '' }}>{{$choice}}</option>
                @endforeach
            </select>
            @if($errors->has('question_'.$question->id)) <span class="error">{{$errors->first("question_".$question->id)}}</span>@endif
        @elseif ($question->question_type === 'number')
            <div class="radio">
                @for ($i = 1; $i <= 5; $i++) <label class="radio-inline">
                    <input type="radio" name="question_{{$question->id}}" value="{{$i}}" {{ ( old("question_".$question->id) != $i )
                        ? ( ($i === 1) ? 'checked' : '' ) : 'checked' }} required>{{$i}}
                    </label>
                    @endfor
            </div>
        @endif
    </div>
    <input type="hidden" name="survey_id" class="form-control mb-4" value="{{$question->survey_id}}">
    @endforeach

    <!-- Send button -->
    <button class="btn btn-info btn-block" type="submit">Finaliser</button>

</form>
<!-- Default form contact -->

@endsection