@if($four)
	@if(!empty($four->link))
		<a href="{{ $four->link }}" target="_blank">
			<img src="{{ $four->file->path() }}" class="img-fluid">
		</a>
	@else
		<img src="{{ $four->file->path() }}" class="img-fluid">
	@endif
@endif