@extends('layouts.master')

@section('title', 'Reset Your Password')

@section('content')

<div class="page-header">
	<h1>Reset Your Password</h1>
</div>

{!! Form::open([ 'action' => 'Auth\PasswordController@postReset']) !!}

{!! Form::hidden('token', $token) !!}

<div class="form-group">
	{!! Form::label('email', 'Email') !!}
	{!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('password', 'New Password') !!}
	{!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('password_confirmation', 'Confirm New Password') !!}
	{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

<button type="submit" class="btn btn-success">Reset Password</button>

{!! Form::close() !!}

@endsection