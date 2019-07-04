@extends('layouts.home')

@section('title')
<title>About | HR Dimension</title>
@endsection

@section('content')
<div class="container-fluid body-search">
  <div class="container">
    <div class="row">
      @include('home.partials.home-filter')
      <!--end advance search-->
      @include('home.partials.seeker-login')
      <!--end job seeker form-->
    </div>
    <!--end row-->
  </div>
  <!--end container-->
</div>
<div class="container-fluid job-tag">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-12 popular-search">
        <div class="col-md-12">
          <br>
            <p><span class="h5">HR Dimension</span> is Cambodia’s leading human resources and recruitment company, specializing in providing human capital resources and assets. Launched in 2009 by HR Dimension CO. LTD, we have grown from specializing in online recruitment to offline, sourcing employees of all standards for businesses and organizations across the country. </p>

            <p>Through our dedicated team of internationally-trained experts, we combine state-of-the-art technology, data analysis and a comprehensive network of partners to find the right person for your business. Calling on our well-established network of potential candidates, we conduct the screening process, saving your company time while ensuring you secure the perfect person to help your business grow. </p>

            <p>Our success and expertise has led to thousands of jobseekers using our services every month to search the more than 5,000 live job ads, and our shift to focus on providing companies with a tool to recruit the best staff possible has seen CAMHR become Cambodia’s elite recruitment agency.</p>

            <br>
            <hr>
            <h5>Our Vision </h5>
            <p>The leading HR solutions provider in Cambodia. </p>

            <h5>Our Mission</h5>
            <p>To provide competent and professional staff to deliver quality service and achieve our clients' goals. </p>
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

@endsection