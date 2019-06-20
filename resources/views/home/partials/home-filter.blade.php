<div class="col-md-8 col-sm-12 advance search">
  <h5>Looking for...</h5>
  <form>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputCity">Key Word</label>
        <input type="text" class="form-control" id="inputCity" placeholder="Input Your Keyword...">
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">Function</label>
        <select id="inputState" class="form-control">
          <option selected>Choose...</option>
          @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">Location</label>
        <select id="inputState" class="form-control">
          <option selected>Choose...</option>
          @foreach($locations as $location)
            <option value="{{ $location->id }}">{{ $location->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary col-md-9 center mx-auto mb-2">Search</button>
    </div>
  </form>
</div>