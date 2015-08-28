<hr>

<h2>Comments</h2>

@include('questions.comments.partials.create')

<hr>

<ul class="list-group">
@foreach ($object->comments as $comment)
	<li class="list-group-item">
		<div class="text-muted">
			<small>{{ $comment->created_at->diffForHumans() }}</small>
		</div>
		<p>{{ $comment->comment }}</p>
		<div class="clearfix">
			<button class="edit-object btn btn-info btn-xs pull-left">edit</button>
			@include('questions.comments.partials.delete')
		</div>

		@include('questions.comments.partials.edit')
	</li>
@endforeach
</ul>