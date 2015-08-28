@extends('layouts.master')

@section('title', 'Edit a Programming Question')

@section('content')

<div class="page-header">
	<h1>Edit a Programming Question</h1>
</div>

{!! Form::model($question, 
	[
		'action' => ['QuestionController@update', $question->id], 
		'method' => 'put'
	]) !!}

	@include('questions.partials.object_form')

  <button class="btn btn-success" type="submit">Update the Question!</button>

{!! Form::close() !!}

@include('questions.partials.delete_object')

@endsection