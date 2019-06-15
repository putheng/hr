<div class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-12 job-brow">
        <h2 class="mt-3 table-urgent-job">Browse Jobs</h2>

        <div class="row table-urgent-job pb-3">
          @foreach($categories as $category)
            <div class="col-md-3 col-sm-12">
              <a href="#">{{ $category->name }}</a>
            </div>
          @endforeach
        </div>
      </div>
      <!--end col-md-8-->
      <div class="col-md-4 col-sm-12">
        <img class="img-fluid" src="/images/Add.jpg">
      </div>
      <!--end md 4-->
    </div>
    <!--end row-->
  </div>
  <!--end container-->
</div>