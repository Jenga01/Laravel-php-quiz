@extends('layout.master')

@section('content')


    <form method="post" action="{{ action('ResultController@saveResult') }}" accept-charset="UTF-8">
        @csrf
        <div class="form=group">
            <label class="control-label col-sm-2" for="score">Correct answers:</label>
            <input readonly="readonly" value="{{$final}}" name="result">

        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <input type="text" class="form-control" name="name">
        </div>

            <button class="btn btn-primary">Save result</button>

    </form>



    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (session('status-final'))
        <div class="alert alert-success">
            {{ session('status-final') }}
            <a href="basic-test/result/table/{{Session::get('test_id')}}">Check answers</a>
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



@endsection
