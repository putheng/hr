<div class="container-fluid job-tag">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-12 popular-search">
        @include('home.partials.quick-filter')
        <div class="col-md-12">
            <h4 class="mt-3">Latest Jobs</h4>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Company</th>
                  <th scope="col">Location</th>
                  <th scope="col">Closing Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach($listings as $listing)
                  <tr>
                    <th scope="row"><a href="{{ route('listing.show', $listing) }}">{{ $listing->title }}</a></th>
                    <td>{{ $listing->company->name }}</td>
                    <td>{{ $listing->location->name }}</td>
                    <td>{{ $listing->closingDate }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <input type="button" class="btn btn-info mx-auto" value="More Jobs">
        </div>
      </div>
      <!--end  popular-search-->
      @include('home.partials.urgent-job')
      <!--end urgent job -->
    </div>
    <!--end row-->
  </div>
  <!--end container-->
</div> 