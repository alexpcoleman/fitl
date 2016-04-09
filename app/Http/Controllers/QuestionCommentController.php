<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Comment;

use Auth;

class QuestionCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @param  int  $questionId
     * @return Response
     */
    // questions/<id>/comments
    public function store(Request $request, $questionId)
    {
        $comment = new Comment;

        $comment->question_id = $questionId;
        $comment->comment = $request->comment;
        $comment->user_id = Auth::user()->id;

        if ( ! $comment->save() ) {
            return redirect()
                ->action('QuestionController@show', $questionId)
                ->with('errors', $comment->getErrors())
                ->withInput();
        }

        // success!
        return redirect()
            ->action('QuestionController@show', $questionId)
            ->with('message', 
                '<div class="alert alert-success">Comment added!</div>');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $questionId
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $questionId, $id)
    {
        $comment = Comment::findOrFail($id);

        if ( ! $comment->canEdit() ) {
            abort('403', 'Not authorized.');
        }

        $comment->comment = $request->comment;

        if ( ! $comment->save() ) {
            return redirect()
                ->action('QuestionController@show', $questionId)
                ->with('errors', $comment->getErrors())
                ->withInput();
        }

        // success!
        return redirect()
            ->action('QuestionController@show', $questionId)
            ->with('message', 
                '<div class="alert alert-success">Comment updated!</div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $questionId
     * @param  int  $id
     * @return Response
     */
    public function destroy($questionId, $id)
    {
        $comment = Comment::findOrFail($id);

        if ( ! $comment->canEdit() ) {
            abort('403', 'Not authorized.');
        }

        $comment->delete();

        return redirect()
            ->action('QuestionController@show', $questionId)
            ->with('message',
                '<div class="alert alert-info">Comment deleted.</div>');
    }
}
