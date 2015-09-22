<div class="col-sm-3">

	<h3>Languages</h3>

	<div class="list-group">
	@foreach ($languages as $language)
		<a class="list-group-item" href="{{ route('languages.show', $language->id) }}">
			{{ $language->name }}</a>
	@endforeach
	</div>

</div><!-- /.col-sm-3 -->