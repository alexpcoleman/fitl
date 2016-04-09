<div class="form-group">
  {!! Form::label('name', 'Name') !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('email', 'Email') !!}
  {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('role_id[]', 'Roles') !!}
	{!! Form::select('role_id[]',
		$roles,
		$user->roles->lists('id')->all(),
		['multiple' => true, 'class' => 'form-control']
	) !!}
</div>