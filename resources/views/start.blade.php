@extends('layout.master')

@section('content')


    <form method="post" action="{{ action('testController@start') }}" accept-charset="UTF-8">
    @csrf
    <button class="btn btn-primary">Start Test</button>
</form>

@endsection
