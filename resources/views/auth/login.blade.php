@extends('layouts.master')

@section('title', 'Login')

@section('content')

<div class="page-header">
	<h1>Login</h1>
</div>

{!! Form::open(['action' => 'Auth\AuthController@postLogin']) !!}

	<div class="form-group">
		{!! Form::label('email', 'Email') !!}
		{!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('password', 'Password') !!}
		{!! Form::password('password', ['class' => 'form-control']) !!}
	</div>	

	<div class="checkbox">
		<label>
			{!! Form::checkbox('remember', 'yes', true) !!} Remember me
		</label>
	</div>

	<button type="submit" class="btn btn-success">Login</button>

{!! Form::close() !!}

<hr>

<p>
	Forgot your password? <a href="{{ action('Auth\PasswordController@getEmail') }}">Reset your password</a>
</p>

<hr>

<p>
	Don't have an account? <a href="{{ action('Auth\AuthController@getRegister') }}">Register now</a>
</p>

@endsection