@extends('layout.master')

@section('content')



@foreach($answers as $a)



    {{$a->question}} <br>

    @if ($a->selected_answer == 1)
        Answer was Correct <br>
    @else
     Answer was Incorrect <br>
    @endif

    @endforeach



@endsection
