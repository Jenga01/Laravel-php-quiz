@extends('layout.master')

@section('content')



@foreach($answers as $a)


    {{$a->question}} <br>

    @if ($a->selected_answer == 1)
        <div class="correct" style="background: #58FF33">
           Answered correctly

        </div>
    @else
        <div class="incorrect" style="background: red">
           Answered incorrectly
        </div>
    @endif

    @endforeach



@endsection
