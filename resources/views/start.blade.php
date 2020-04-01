@extends('layout.master')

@section('content')


    <form method="post" action="{{ action('testController@start') }}" accept-charset="UTF-8">
        @csrf

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <select name="type">
                    <option value="1">Test 1</option>
                    <option value="2">Test 2</option>
                </select>
            </div>
        </div>


        <button class="btn btn-primary">Start Test</button>
    </form>

@endsection
