<div class="col-4">
  <div class=" urgent-job">
    <h2 class="table-urgent-job">{{ __('general.Urgent') }}</h2> 
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
  <br>
  @include('ads.three')
  <!--end carousel-->
</div>