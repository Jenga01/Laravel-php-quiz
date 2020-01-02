@extends('layout.master')

@section('content')



@foreach($answers as $a)


    {{$a->question}} <br>

    @if ($a->selected_answer == 1)
        <div class="correct" style="background: #58FF33">
            Correct
        </div>

    @else
        <div class="incorrect" style="background: red">
           Incorrect
        </div>
    @endif

    @endforeach



@endsection
