<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Question;



class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderby('id', 'desc')->paginate(10);
        log::info('*************************    ' . $questions);

        return view('questions.index')->with('questions', $questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate form data - this $request is the form data
        // that was passed to the route with the form.
        // the data will be validated using laravels validate
        //function. The validate function can take an
        // for the validation fields, an associative array
        // the key, needs to match on of the input field names
        // that was in the submitted data

        $this->validate($request, [
            'title' => 'required|max:255'
        ]);

        // Process and submit data

        /**if the data passes validation, we then need get the information that we need
        *from the $request. You can access the required data, by doing $request->nameofthepostedfiled
        also we need to make use of the model here, so we need to import the model, by doing use and
         a link to the file will popup*/

        $question = new Question(); // created a new question that was initiated from the model
        $question->title = $request->title; //taking the posted title and saving to the db
        $question->description = $request->description;

        if ($question->save()){
            log::info('Question with the id ' . $question->id. 'successfully save to the DB');
            return redirect()->route('questions.show', $question->id);


        } else{
            log::info('Question with the id ' . $question->id. ' NOT successfully save to the DB');
            return redirect('questions.create');

        }

        //  redirect
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);
        log::info('Question with the id ' . $question->id. 'successfully save to the DB');
        log::info($question);

        return view('questions.show')->with('question',$question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

/**
  * so for this to work, you need to first think about what you would like to achieve, first you need to get the
 * data from the db and pass it via the controller to the view, laravel will dynamically use the id that is stored
 * in the db to generate a page for each of the entries, aslo you would need to redirect the use to the page when
 * you've got the data, so you would nee to use the return redirect()->route('view that needs to be returned in laravels way', 'variable that is need to be passed through to the view')
 * You would also need to have a look a elloquest as this makes the db calls for you annd laravel has its own pagination that can be used
 */