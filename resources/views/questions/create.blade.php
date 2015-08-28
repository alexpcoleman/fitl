@extends('layouts.master')

@section('title', 'Submit a Programming Question')

@section('content')

<div class="page-header">
	<h1>Submit a Programming Question</h1>
</div>

{!! Form::model($question, ['action' => 'QuestionController@store']) !!}

	@include('questions.partials.object_form')

  <button class="btn btn-success" type="submit">Submit Your Question!</button>

{!! Form::close() !!}

@endsection