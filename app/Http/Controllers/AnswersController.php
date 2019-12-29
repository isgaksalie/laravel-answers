<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Answer;

class AnswersController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
         * as this is relationship based you must make use of the relating model
         * so that you have the relating question. you are using the findOrFail method to find the relating question
         * with the $request->question_id that was posted to the function
         * You make use of the model ny calling as a function, you need to make use of the other variable
         * that was instantiated with the findOrFail method
         */

        $this->validate($request, [
            'answer'      => 'required|min:15',
            'question_id' => 'required|integer'
        ]);

        $answer = new Answer();
//        $answer->question_id = $request->question_id;
        $answer->content = $request->answer;

        $question = Question::findOrFail($request->question_id);
        $question->answers()->save($answer);
        log::info('Answer saved');

        return redirect()->route('questions.show', $request->question_id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
