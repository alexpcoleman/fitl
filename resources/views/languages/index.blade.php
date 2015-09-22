
@extends('layouts.master')

@section('title', 'Programming Languages')

@section('content')

<div class="page-header">
	<a href="{{ route('languages.create') }}" class="btn btn-success pull-right">+ Programming Language</a>
	<h1>Programming Languages</h1>
</div>

<div class="list-group">

	@foreach ($languages as $language)
		<div class="list-group-item">
			<h2 class="list-group-item-heading">{{ $language->name }}</h2>
			<p class="list-group-item-text">
				<a href="{{ route('languages.edit', [$language->id]) }}">edit</a>
			</p>
		</div>
	@endforeach

</div>

@endsection