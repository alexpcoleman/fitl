<div class="list-group">

	@foreach ($questions as $question)
		<a href="{{ url('questions', [$question->id]) }}" class="list-group-item">
			<h2 class="list-group-item-heading">{{ $question->title }}</h2>
			<p class="list-group-item-text">
				Submitted on {{ $question->created_at }}
			</p>
		</a>
	@endforeach

</div>