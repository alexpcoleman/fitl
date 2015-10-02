{!! Form::open([
		'action' => 'QuestionController@search',
		'method' => 'get',
		'class' => 'navbar-form navbar-right'
	]) !!}

	<div class="input-group">
		{!! Form::text('q', Request::input('q'), ['class' => 'form-control', 'placeholder' => 'Search for...']) !!}
		<span class="input-group-btn">
			<button class="btn btn-default" type="submit">Go!</button>
		</span>
	</div><!-- /.input-group -->

{!! Form::close() !!}