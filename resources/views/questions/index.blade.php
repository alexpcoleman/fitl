
@extends('layouts.master')

@section('title', 'Programming Questions')

@section('content')

<div class="page-header">
	<a href="{{ url('questions/create') }}" class="btn btn-success pull-right">+ Question</a>
	<h1>Programming Questions</h1>
</div>

<div class="list-group">

	@foreach ($objects as $question)
		<a href="{{ url('questions', [$question->id]) }}" class="list-group-item">
			<h2 class="list-group-item-heading">{{ $question->title }}</h2>
			<p class="list-group-item-text">
				Submitted on {{ $question->created_at }}
			</p>
		</a>
	@endforeach

</div>

@endsection