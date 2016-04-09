@extends('layouts.admin')

@section('title', 'Edit a User')

@section('content')

<div class="page-header">
	<h1>Edit a User</h1>
</div>

{!! Form::model($user, 
	[
		'action' => ['Admin\UserController@update', $user->id], 
		'method' => 'put'
	]) !!}

	@include('admin.users.partials.object_form')

  <button class="btn btn-success" type="submit">Update the User!</button>

{!! Form::close() !!}

@include('admin.users.partials.delete_object')

@endsection