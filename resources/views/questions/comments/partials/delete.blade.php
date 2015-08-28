{!! Form::open([
		'route' => ['questions.comments.destroy', $object->id, $comment->id],
		'method' => 'delete',
		'class' => 'pull-left'
	]) !!}

	&nbsp;<button class="btn btn-danger btn-xs">delete</button>

{!! Form::close() !!}