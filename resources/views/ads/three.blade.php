@if($three)
	@if(!empty($three->link))
		<a href="{{ $three->link }}" target="_blank">
			<img src="{{ $three->file->path() }}" class="img-fluid">
		</a>
	@else
		<img src="{{ $three->file->path() }}" class="img-fluid">
	@endif
@endif