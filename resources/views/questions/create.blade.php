@extends('layouts.master')

@section('title', 'Submit a Programming Question')

@section('content')

<div class="page-header">
	<h1>Submit a Programming Question</h1>
</div>

{!! Form::model($question, ['action' => 'QuestionController@store']) !!}

	<div class="form-group">
    {!! Form::label('title', 'What is your question?') !!}
    {!! Form::text('title', '', ['class' => 'form-control']) !!}
  </div>

	<div class="form-group">
    {!! Form::label('description', 'Describe your situation in more detail.') !!}
    {!! Form::textarea('description', '', ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('code', 'Include a code sample. (optional)') !!}
    {!! Form::textarea('code', '', ['class' => 'form-control']) !!}
  </div>

  <button class="btn btn-success" type="submit">Submit Your Question!</button>

{!! Form::close() !!}

@endsection