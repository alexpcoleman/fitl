<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Language;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.languages.index', [ 'languages' => Language::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.languages.create', [ 'language' => new Language ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $language = new Language;
        $language->name = $request->name;

        if ( ! $language->save() ) {
            // redirect back to create and show errors
            return redirect()
                ->route('admin.languages.create')
                ->with('errors', $language->getErrors())
                ->withInput();
        }

        // success!
        // redirect to index, with success message
        return redirect()
            ->route('admin.languages.index')
            ->with('message',
                '<div class="alert alert-success">Your new language was created!</div>');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $language = Language::findOrFail($id);

        return view('admin.languages.edit', [ 'language' => $language ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $language = Language::findOrFail($id);
        $language->name = $request->name;

        if ( ! $language->save() ) {
            // redirect back to edit and show errors
            return redirect()
                ->route('admin.languages.edit', $language->id)
                ->with('errors', $language->getErrors())
                ->withInput();
        }

        // success!
        // redirect to index, with success message
        return redirect()
            ->route('admin.languages.index')
            ->with('message',
                '<div class="alert alert-success">Your language has been updated!</div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $language = Language::findOrFail($id);

        $language->delete();

        return redirect()
            ->route('admin.languages.index')
            ->with('message', 
                '<div class="alert alert-info">The language was deleted.</div>');
    }
}
