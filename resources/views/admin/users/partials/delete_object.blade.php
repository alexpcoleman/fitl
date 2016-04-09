<hr>

<h2>Delete this user:</h2>

{!! Form::open([ 
	'action' => ['Admin\UserController@destroy', $user->id],
	'method' => 'delete',
	'class' => 'delete-object'
]) !!}

	<button type="submit" class="btn btn-danger">DELETE this user!</button>

{!! Form::close() !!}