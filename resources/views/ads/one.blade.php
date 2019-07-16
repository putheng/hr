@if($one)
<div class="banner-slide">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      @foreach($one as $key => $item)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
          @if(!empty($item->link))
            <a href="{{ $item->link }}" target="_blank">
              <img style="max-height: 90px;" src="{{ $item->file->path() }}" class="d-block w-100" alt="{{ $item->name }}">
            </a>
          @else
            <img style="max-height: 90px;" src="{{ $item->file->path() }}" class="d-block w-100" alt="{{ $item->name }}">
          @endif
        </div>
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>
  </div>
</div>
@endif