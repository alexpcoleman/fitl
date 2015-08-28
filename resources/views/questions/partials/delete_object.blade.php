<hr>

<h2>Delete this question:</h2>

{!! Form::open([ 
	'action' => ['QuestionController@destroy', $question->id],
	'method' => 'delete',
	'class' => 'delete-object'
]) !!}

	<button type="submit" class="btn btn-danger">DELETE this question!</button>

{!! Form::close() !!}