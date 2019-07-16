@if($two)
<div class="col-md-4 col-sm-12">
	@if(!empty($two->link))
		<a href="{{ $two->link }}" target="_blank">
			<img src="{{ $two->file->path() }}" class="img-fluid">
		</a>
	@else
		<img src="{{ $two->file->path() }}" class="img-fluid">
	@endif
</div>
@endif