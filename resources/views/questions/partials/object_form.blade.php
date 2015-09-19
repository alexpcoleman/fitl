<div class="form-group">
  {!! Form::label('title', 'What is your question?') !!}
  {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('description', 'Describe your situation in more detail.') !!}
  {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('code', 'Include a code sample. (optional)') !!}
  {!! Form::textarea('code', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('language_id[]', 'Programming Languages') !!}
	{!! Form::select('language_id[]',
		$languages,
		$question->languages->lists('id')->all(),
		['multiple' => true, 'class' => 'form-control']
	) !!}
</div>