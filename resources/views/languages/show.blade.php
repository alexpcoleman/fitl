@extends('layouts.master')

@section('title', $language->name . ' Questions')

@section('content')

<div class="row">

	<div class="col-sm-9">

		<div class="page-header">
			<a href="{{ url('questions/create') }}" class="btn btn-success pull-right">+ Submit Question</a>
			<h1>{{ $language->name }} Questions</h1>
		</div>

		<div class="list-group">

			@foreach ($language->questions as $question)
				<a href="{{ url('questions', [$question->id]) }}" class="list-group-item">
					<h2 class="list-group-item-heading">{{ $question->title }}</h2>
					<p class="list-group-item-text">
						Submitted on {{ $question->created_at }}
					</p>
				</a>
			@endforeach

		</div>

	</div><!-- /.col-sm-9 -->

	@include('shared.questions_sidebar')

</div><!-- /.row -->

@endsection