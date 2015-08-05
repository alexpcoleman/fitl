@extends('layouts.master')

@section('title', $object->title)

@section('content')
<h1><?php echo $object->title; ?></h1>
<p><?php echo $object->description; ?></p>
<pre>
	<?php echo $object->code; ?>
</pre>
<p>Question submitted at: <?php echo $object->created_at; ?></p>
@endsection