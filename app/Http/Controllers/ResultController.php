<?php

namespace App\Http\Controllers;

use App\Models\FinalResults;
use App\Models\Question;
use App\Models\Result;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ResultController extends Controller
{


    public function saveAnswer(Request $request)
    {
        $request->validate(
            [
                'selected_answer' => 'required'
            ]
        );

        $id = $request->input('id');
        $result = new Result();
        $result->selected_answer = $request->selected_answer;
        $result->test_id = Session::get('test_id');
        $result->question_id = Session::get('qid');
        $result->save();


        return redirect('basic-test/' . $id)->with('status', 'Answer saved!');
    }

    public function getResult()
    {
        $testid = Session::get('test_id');
        $final = Result::where('test_id', '=', $testid)->sum('selected_answer');

        return view('result')->with(compact('final'));
    }


    public function saveResult(Request $request)
    {
        $request->validate(
            [
                'name' => 'required'
            ]
        );


        $saveResult = new FinalResults();

        $saveResult->name = $request->name;
        $saveResult->result = $request->result;
        $saveResult->test_id = Session::get('test_id');

        if ($saveResult->save()) {
            return redirect('basic-test/')->with('status-final', 'Your name and result has been saved!');
        }
    }

    public function showAnswers($id)
    {
        $testid = Session::get('test_id');


        $answers = Test::findOrFail($id)
            ->join('results', 'results.test_id', '=', 'tests.id')
            ->join('questions', 'questions.id', '=', 'results.question_id')
            ->select('questions.question', 'results.selected_answer')
            ->where('results.test_id', '=', $testid)
            ->get();


        return view('results_table')->with(compact('answers'));
    }


}
