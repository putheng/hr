<div class="col-4 urgent-job">
  <h2 class="table-urgent-job">Urgent Jobs</h2> 
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <table class="table table-hover table-urgent-job">
          
          <tbody>
            @foreach($urgents as $urgent)
              <tr>
                <td><a href="{{ route('listing.show', $urgent) }}">{{ $urgent->title }}</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--end carousel-->
</div>