@extends('layouts.admin')

@section('title', 'Users')

@section('content')

<div class="page-header">
	<h1>Users</h1>
</div>

<ul class="list-group">
	@foreach ($users as $user)
		<li class="list-group-item">
			<a class="btn btn-info btn-xs pull-right"
				href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
			{{ $user->name }}
			<br>{{ $user->email }}
			<br><strong>Roles:</strong>
			<ul>
				@foreach ($user->roles as $role)
					<li>{{ $role->name }}</li>
				@endforeach
			</ul>
		</li>
	@endforeach
</ul>

@endsection