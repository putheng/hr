@if($two)
<div class="col-md-4 col-sm-12">
  <img src="{{ $two->file->path() }}" class="img-fluid">
</div>
@endif