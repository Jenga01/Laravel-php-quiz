<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Result;
use App\Models\Test;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;


if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}


class testController extends Controller
{



   public function index()
   {

        session()->put('question');

       return view('start');

    }

    public function start(Request $request)
    {

        $start = new Test();

        $start->id = $request->start;

       if($start->save())
       {

           $id = $start->id;
           Session::put('test_id', $id);

           return redirect('basic-test/'. random_int(1,10))->with('status', 'Test started!');
       }


    }



    public function getQuestion(Request$request, $id)
    {

        $question = Question::findOrFail($id);
        //$answer = $question->question()->where('question_id', '=', $question->id)->get();;

        Session::put('qid', $id);

        $request->session()->push('question', $id);
        session() ->get('question');

        $question_session = session('question');
        $question_check = Question::whereNotIn('id',$question_session )->inRandomOrder()->get();; //checks if question with this id exists on the stack

        $answer = Answer::findOrFail($id)->question()->where('question_id', '=', $question->id)->get();


        $testid = Session::get('test_id');
        $result = Result::where('test_id', '=', $testid)->sum('selected_answer');

        Session::put('result', $result);

        return view('test') ->with(compact( 'question_check', 'question', 'question_session', 'answer', 'result', 'answer_id'));


    }



}
