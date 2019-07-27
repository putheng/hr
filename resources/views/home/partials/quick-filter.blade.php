<div class="col-md-12 popular-cate">
  <h5>{{ __('general.Quick') }}</h5>

  <a href="{{ route('home.filter', array_merge(request()->query(), ['term' => 2])) }}">Full-time
  </a>
  <a href="{{ route('home.filter', array_merge(request()->query(), ['term' => 1])) }}">
  	Part-Time
  </a>
  <a href="{{ route('home.filter', array_merge(request()->query(), ['term' => 6])) }}">
  	Internship
  </a>
</div>