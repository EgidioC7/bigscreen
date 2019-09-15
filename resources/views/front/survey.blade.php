@extends('layouts.master')

@section('content')

    <!-- Default form contact -->
    <p class="text-white text-center font-weight-bold text-uppercase px-3 small py-4 mb-0">Merci de répondre à toute les
        questions et de valider le formulaire en bas de page</p>

    <form class="text-center p-5" method="POST" action="{{action('FrontController@store')}}">

        {{ csrf_field() }}

        @foreach($survey->question as $question )

            <div class="form-group shadow border-0">
                <h4>Question {{$question->id}}/{{$count}}</h4>
                <label for="question_{{$question->id}}"><strong>{{$question->title}}</strong></label>
                @if($question->question_type === 'B')
                    @if($question->id === 1)
                        <input type="email" name="question_{{$question->id}}" id="question_{{$question->id}}"
                               class="form-control mb-4" placeholder="E-mail"
                               required value="{{old('question_'.$question->id)}}">
                        @if($errors->has('question_'.$question->id)) <span
                                class="error">{{$errors->first("question_".$question->id)}} @endif
                            @elseif($question->id === 2)
                                <input type="number" name="question_{{$question->id}}" id="question_{{$question->id}}"
                                       class="form-control mb-4"
                                       placeholder="{{$question->title}}" value="{{old('question_'.$question->id)}}"
                                       required>
                                @if($errors->has('question_'.$question->id)) <span
                                        class="error">{{$errors->first("question_".$question->id)}}</span>@endif
                            @elseif($question->id === 20)
                                <textarea class="form-control" name="question_{{$question->id}}"
                                          id="question_{{$question->id}}" rows="3"
                                          required>{{old('question_'.$question->id)}}</textarea>
                                @if($errors->has('question_'.$question->id)) <span
                                        class="error">{{$errors->first("question_".$question->id)}}</span>@endif
                            @else
                                <input type="text" name="question_{{$question->id}}" id="question_{{$question->id}}"
                                       class="form-control mb-4"
                                       placeholder="{{$question->title}}" required
                                       value="{{old('question_'.$question->id)}}">
                                @if($errors->has('question_'.$question->id)) <span
                                        class="error">{{$errors->first("question_".$question->id)}}</span>@endif
                            @endif
                            @elseif ($question->question_type === 'A' )
                                <select id="question_{{$question->id}}" name="question_{{$question->id}}"
                                        class="browser-default custom-select mb-4"
                                        required>
                <option value="0"
                        disabled {{ is_null(old("question_".$question->id)) ? 'selected' : '' }}>-- Choisir --</option>
                @foreach( unserialize($question->choice) as $choice)
                                        <option value="{{$choice}}" {{ (old("question_".$question->id) === $choice ) ? 'selected' : '' }}>{{$choice}}</option>
                                    @endforeach
            </select>
                                @if($errors->has('question_'.$question->id)) <span
                                        class="error">{{$errors->first("question_".$question->id)}}</span>@endif
                            @elseif ($question->question_type === 'C')
                                <div class="radio">
                @for ($i = 1; $i <= 5; $i++) <label class="radio-inline">
                    <input type="radio" name="question_{{$question->id}}" value="{{$i}}" {{ ( old("question_".$question->id) != $i )
                        ? ( ($i === 1) ? 'checked' : '' ) : 'checked' }} required>{{$i}}<span class="outside"><span
                                                    class="inside"></span></span>
                    </label>
                                    @endfor
            </div>
                        @endif
            </div>

        @endforeach

        <input type="hidden" name="survey_id" class="form-control mb-4" value="{{$survey->id}}">
        <!-- Send button -->
        <button class="btn btn-info btn-block" type="submit">Finaliser</button>

    </form>
    <!-- Default form contact -->

@endsection