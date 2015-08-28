<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $questions = Question::all();

        $data = array();
        $data['objects'] = $questions;

        return view('questions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $question = new Question;
        $data = array();
        $data['question'] = $question;
        return view('questions.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $question = new Question;

        // set the question's data from the form data
        $question->title = $request->title;
        $question->description = $request->description;
        $question->code = $request->code;

        // create the new question in the database
        if (!$question->save()) {
            $errors = $question->getErrors();

            // redirect back to the create page
            // and pass along the errors
            return redirect()
                ->action('QuestionController@create')
                ->with('errors', $errors)
                ->withInput();
        }

        // success!
        return redirect()
            ->action('QuestionController@index')
            ->with('message', 
                '<div class="alert alert-success">Question created successfully!</div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $data = array();

        $question = Question::findOrFail($id);
        $data['object'] = $question;

        return view('questions.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('questions.edit', ['question' => $question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $question = Question::findOrFail($id);

        // set question's data from form data
        $question->title = $request->title;
        $question->description = $request->description;
        $question->code = $request->code;

        // if the save fails,
        // redirect back to the edit page
        // and show the errors
        if (!$question->save()) {
            return redirect()
                ->action('QuestionController@edit', $question->id)
                ->with('errors', $question->getErrors())
                ->withInput();
        }

        // success!
        // redirect to index and pass a success message
        return redirect()
            ->action('QuestionController@index')
            ->with('message',
                '<div class="alert alert-success">The question was updated!</div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);

        $question->delete();

        return redirect()
            ->action('QuestionController@index')
            ->with('message',
                '<div class="alert alert-info">The question was deleted.</div>');
    }
}
