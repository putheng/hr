<div class="col-md-8 col-sm-12 advance search">
  <h5>Looking for...</h5>
  <form action="{{ route('home.filter') }}" method="get">
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputCity">Key Word</label>
        <input value="{{ request()->get('title') }}" name="title" type="text" class="form-control" id="inputCity" placeholder="Job title ...">
      </div>
      <div class="form-group col-md-4">
        <label for="inpuCategory">Function</label>
        <select name="category" id="inpuCategory" class="form-control">
          <option value="">Choose...</option>
          @foreach($categories as $category)
            <option {{ request()->category == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">Location</label>
        <select name="location" id="inputState" class="form-control">
          <option value="">Choose...</option>
          @foreach($locations as $location)
            <option {{ request()->location == $location->id ? 'selected' : '' }} value="{{ $location->id }}">{{ $location->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary col-md-9 center mx-auto mb-2">Search</button>
    </div>
  </form>
</div>