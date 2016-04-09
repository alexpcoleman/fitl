@extends('layouts.admin')

@section('title', 'Edit a Programming Language')

@section('content')

<div class="page-header">
	<h1>Edit a Programming Language</h1>
</div>

{!! Form::model($language, 
	[ 
		'route' => ['admin.languages.update', $language->id],
		'method' => 'put'
	]
	) !!}

	@include('admin.languages.partials.object_form')

  <button class="btn btn-success" type="submit">Save Changes</button>

{!! Form::close() !!}

@include('admin.languages.partials.delete_object')

@endsection