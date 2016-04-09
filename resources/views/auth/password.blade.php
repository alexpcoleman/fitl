@extends('layouts.master')

@section('title', 'Reset Your Password')

@section('content')

<div class="page-header">
	<h1>Reset Your Password</h1>
</div>

{!! Form::open([ 'action' => 'Auth\PasswordController@postEmail']) !!}

<div class="form-group">
	{!! Form::label('email', 'Email') !!}
	{!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
</div>

<button type="submit" class="btn btn-success">Send Password Reset Link</button>

{!! Form::close() !!}

@endsection