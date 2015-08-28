@extends('layouts.master')

@section('title', $object->title)

@section('content')

<div class="page-header">
	<a href="{{ action('QuestionController@edit', $object->id) }}" 
		class="btn btn-info pull-right">Edit</a>
	<h1><?php echo $object->title; ?></h1>
</div>

<p><?php echo $object->description; ?></p>
<pre>
	<?php echo $object->code; ?>
</pre>
<p>Question submitted at: <?php echo $object->created_at; ?></p>

@include('questions.comments.partials.display')

@endsection