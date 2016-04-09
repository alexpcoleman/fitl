@extends('layouts.master')

@section('title', 'My Profile')

@section('content')
<div class="page-header">
	<h1>My Profile</h1>
</div>

<h2>Submitted Questions</h2>

@include('questions.partials.questions', ['questions' => $questions])

<h2>Submitted Comments</h2>

<ul class="list-group">
@foreach ($comments as $comment)
	<li class="list-group-item">
		<div class="text-muted">
			<small>{{ $comment->created_at->diffForHumans() }}</small>
		</div>
		<p><small>Question:</small> <strong>{{ $comment->question->title }}</strong></p>
		<p>{{ $comment->comment }}</p>
	</li>
@endforeach
</ul>

@endsection