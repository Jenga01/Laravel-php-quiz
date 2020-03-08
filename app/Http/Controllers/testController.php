<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Result;
use App\Models\Test;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;




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
        $start->type = $request->type;

       if($start->save())
       {

           $id = $start->id;
          $type = $start->type;

           Session::put('test_id', $id);
           Session::put('type',  $type);


           if ($type == 1){

               return redirect('basic-test/'. random_int(1,10))->with('status', 'Test 1 started!');
           }else
               return redirect('basic-test/'. random_int(11,20))->with('status', 'Test 2 started!');



       }


    }


    public function getQuestion(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        Session::put('qid', $id);

        $request->session()->push('question', $id);
        session()->get('question');

        $question_session = session('question');
        $type = Session::get('type');
        $question_check = Question::whereNotIn('id',$question_session )->where('type', '=', $type)->inRandomOrder()->first();; //checks if question with this id exists on the stack
        $answer = Answer::findOrFail($id)->question()->get();
        $testid = Session::get('test_id');

        $result = Result::where('test_id', '=', $testid)->sum('selected_answer');

        Session::put('result', $result);

        return view('test') ->with(compact( 'question_check', 'question', 'question_session', 'answer', 'result'));




    }



}
