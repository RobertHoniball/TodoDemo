@if (count($errors) > 0)
<div class="alert alert-danger margin-top-15">
	<b>An error has occured</b><br>
	@foreach ($errors->all() as $error)
		{{ $error }} <br>
	@endforeach
</div>
@endif
