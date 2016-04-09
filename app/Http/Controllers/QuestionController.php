<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Question;
use App\Language;

use Auth;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $questions = Question::all();

        $data = array();
        $data['questions'] = $questions;
        $data['languages'] = Language::all();

        return view('questions.index', $data);
    }

    public function search(Request $request)
    {
        // retrieve query from URL
        $q = $request->q;

        // SQL LIKE format for matching on search query:
        // %SEARCH_TERM%
        $q_query = '%' . $q . '%';
        $questions = Question::where('title', 'LIKE', $q_query)
                            ->orWhere('description', 'LIKE', $q_query)
                            ->orWhere('code', 'LIKE', $q_query)
                            ->get();

        return view('questions.search',
            ['q' => $q, 'questions' => $questions, 'languages' => Language::all()]);
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
        // <select><option value="VALUE">TEXT</option></select>
        // [ VALUE => TEXT, VALUE => TEXT ]
        // <option value="1">JavaScript</option>
        // <option value="2">PHP</option>
        $data['languages'] = Language::lists('name', 'id');
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
        $question->user_id = Auth::user()->id;

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

        // establish language relationships
        if ($request->language_id) {
            $question->languages()->sync($request->language_id);
        }

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
        $data['question'] = $question;

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

        if ( ! $question->canEdit() ) {
            abort('403', 'Not authorized.');
        }
        
        $languages = Language::lists('name', 'id');
        return view('questions.edit', ['question' => $question, 'languages' => $languages]);
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

        if ( ! $question->canEdit() ) {
            abort('403', 'Not authorized.');
        }

        // set question's data from form data
        $question->title = $request->title;
        $question->description = $request->description;
        $question->code = $request->code;
        $question->languages()->sync($request->language_id);

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

        if ( ! $question->canEdit() ) {
            abort('403', 'Not authorized.');
        }

        $question->delete();

        return redirect()
            ->action('QuestionController@index')
            ->with('message',
                '<div class="alert alert-info">The question was deleted.</div>');
    }
}
