<div class="col-md-8 col-sm-12 advance search">
  <br>
  <h5>{{ __('general.Looking') }}</h5>
  <form action="{{ route('home.filter') }}" method="get">
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputCity">{{ __('general.Key') }}</label>
        <input value="{{ request()->get('title') }}" name="title" type="text" class="form-control" id="inputCity" placeholder="{{ __('general.title') }}">
      </div>
      <div class="form-group col-md-4">
        <label for="inpuCategory">{{ __('general.Function') }}</label>
        <select name="category" id="inpuCategory" class="form-control">
          <option value="">{{ __('general.Choose') }}</option>
          @foreach($categories as $category)
            <option {{ request()->category == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">{{ __('general.Location') }}</label>
        <select name="location" id="inputState" class="form-control">
          <option value="">{{ __('general.Choose') }}</option>
          @foreach($locations as $location)
            <option {{ request()->location == $location->id ? 'selected' : '' }} value="{{ $location->id }}">{{ $location->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-12 text-center">
      <br>
      <button type="submit" class="btn btn-primary col-md-8 center mx-auto mb-2">{{ __('general.search_btn') }}</button>
    </div>
  </form>
</div>