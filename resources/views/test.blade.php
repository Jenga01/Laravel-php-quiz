@extends('layout.master')

@section('content')



    <form method="post" action="{{ action('ResultController@saveAnswer') }}" accept-charset="UTF-8">
        @csrf
        <div class="form-group">
            <b><label class="control-label col-sm-2" for="email">Question:</label></b>
            <div class="col-sm-10">
                {{$question->question}}
            </div>
        </div>
        @foreach($answer as $a)

            <div class="form-group">
                <b><label class="control-label col-sm-2" for="pwd">Answer:</label></b>
                <div class="col-sm-10">
                    <input type="radio" class="form-control" name="selected_answer"
                           value="{{$a->is_correct}}">{{$a->answer}}

                </div>
            </div>
        @endforeach

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">

            </div>
        </div>
        <div class="form-group">
            <input type="hidden" value="{{optional($question_check)->id}}" name="id">
            <button class="btn btn-primary">Submit</button>

        </div>

    </form>


    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script>


    </script>



@endsection




