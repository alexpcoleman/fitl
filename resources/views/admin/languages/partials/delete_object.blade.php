<hr>

<h2>Delete this language:</h2>

{!! Form::open([ 
	'route' => ['admin.languages.destroy', $language->id],
	'method' => 'delete',
	'class' => 'delete-object'
]) !!}

	<button type="submit" class="btn btn-danger">DELETE this language!</button>

{!! Form::close() !!}