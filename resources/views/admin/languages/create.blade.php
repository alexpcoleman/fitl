@extends('layouts.admin')

@section('title', 'Create a Programming Language')

@section('content')

<div class="page-header">
	<h1>Create a Programming Language</h1>
</div>

{!! Form::model($language, ['route' => 'admin.languages.store']) !!}

	@include('admin.languages.partials.object_form')

  <button class="btn btn-success" type="submit">Create Language!</button>

{!! Form::close() !!}

@endsection