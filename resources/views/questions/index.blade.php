
@extends('layouts.master')

@section('title', 'Programming Questions')

@section('content')

<div class="row">

	<div class="col-sm-9">

		<div class="page-header">
			<a href="{{ url('questions/create') }}" class="btn btn-success pull-right">+ Question</a>
			<h1>Recent Questions</h1>
		</div>

		@include('questions.partials.questions')

	</div><!-- /.col-sm-9 -->

	@include('shared.questions_sidebar')

</div><!-- /.row -->

@endsection