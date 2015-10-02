@extends('layouts.master')

@section('title', $question->title)

@section('content')

<div class="page-header">
	<a href="{{ action('QuestionController@edit', $question->id) }}" 
		class="btn btn-info pull-right">Edit</a>
	<h1><?php echo $question->title; ?></h1>
</div>

<p><?php echo $question->description; ?></p>
<pre>
	<?php echo $question->code; ?>
</pre>
<p>Question submitted at: <?php echo $question->created_at; ?></p>

@include('questions.comments.partials.display')

@endsection