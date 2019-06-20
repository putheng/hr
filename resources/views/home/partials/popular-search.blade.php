<div class="container-fluid job-tag">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-12 popular-search">
        <div class="col-md-12 popular-cate">
          <h5>Popular Search:</h5>

          Full-time| Part-time| Internship| Urgent| New Jobs| Managerial Jobs| NGO| Fresh Graduated
        </div>
        <div class="col-md-12">
            <h2 class="mt-3">Job List</h2>
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
                    <th scope="row">{{ $listing->title }}</th>
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
      <div class="col-4 urgent-job">
        <h2 class="table-urgent-job">Urgent Jobe</h2> 
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <table class="table table-hover table-urgent-job">
                <thead>
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Location</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($urgents as $urgent)
                    <tr>
                      <td>{{ $urgent->title }}</td>
                      <td>{{ $urgent->location->name }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="carousel-item">
              <table class="table table-hover table-urgent-job">
                <thead>
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Location</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($urgents as $urgent)
                    <tr>
                      <td>{{ $urgent->title }}</td>
                      <td>{{ $urgent->location->name }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!--end carousel-->
      </div>
      <!--end urgent job -->
    </div>
    <!--end row-->
  </div>
  <!--end container-->
</div> 