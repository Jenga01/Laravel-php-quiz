@extends('layout.master')

@section('content')

        @foreach($question_check as $q)

            {{$q->id}}



            @endforeach

        <form method="post" action="{{ action('ResultController@saveAnswer') }}" accept-charset="UTF-8">
            @csrf
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Question:</label>
            <div class="col-sm-10">
                {{$question->question}}
            </div>
        </div>
        @foreach($answer as $a)

        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Answer:</label>
            <div class="col-sm-10">
                <input type="radio" class="form-control" id="answer_id" name="selected_answer" value="{{$a->is_correct}}">{{$a->answer}}
            </div>
        </div>
        @endforeach

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
{{--                <a href="{{url('basic-test/'. optional($q)->id) }}" class="btn btn-info">Next</a>--}}
            </div>
        </div>
            <div class="form-group">
                <input type="hidden" value="{{optional($q)->id}}" name="id">
                <button class="btn btn-primary">Submit</button>

            </div>

        </form>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              {{$result}} questions out of 10 answered correctly
            </div>
        </div>


        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        {{ \Illuminate\Support\Facades\Session::get('type') }}




@endsection




