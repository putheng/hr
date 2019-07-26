@extends('layouts.home')

@section('title')
<title>{{ $package->title }} | HR Dimension</title>
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
        <div class="col-md-8">

<div class="resp-pt">
  <div class="pt-block">
    <div class="pt-back">
    </div>
    <div class="pt-head">
      <div class="pt-title">{{ $package->title }}</div>
    </div>
    <div class="pt-price-block">${{ $package->price }}</div>
    <ul class="pt-list">
      <li>
        {{ $package->post }} Posts
      </li>
      <li>
        Free {{ $package->cv }} cv search
      </li>
      <li>
        Valid {{ $package->days }} days
      </li>
      <li>
        {{ $package->description }}
      </li>
    </ul>
  </div>
</div>

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

<style>
.resp-pt {
  cursor: default;
  font-family: Helvetica, Arial, sans-serif;
  font-size: 14px;
  line-height: 1.2;
  color: #38678f;
  text-align: center;
  position: relative;
  z-index: 1;
}

.resp-pt *,
.resp-pt *:before,
.resp-pt *:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.resp-pt .pt-block {
  margin: 30px 0 40px;
  position: relative;
  z-index: 1;
  padding: 35px 15px 25px;
}

.resp-pt .pt-back {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  z-index: -1;
  background-color: #fff;
}

.resp-pt .pt-head {
  position: relative;
  padding-bottom: 25px;
}

.resp-pt .pt-price-block {
  font-size: 40px;
  line-height: 60px;
  color: #4682b4;
}

.resp-pt .pt-title {
  font-size: 30px;
  line-height: 17px;
  color: #4682b4;
}

.resp-pt .pt-sub-text {
  text-transform: uppercase;
  color: #568ebd;
}
.resp-pt .pt-sub-title {
  padding-top: 5px;
  font-size: 21px;
  line-height: 22px;
  color: #7ba7cc;
}

.resp-pt .pt-footer {
  text-align: center;
  padding-top: 35px;
}

.resp-pt .pt-btn {
  background-color: #4682b4;
  color: #fff;
  border: 1px solid #3f75a2;
  font-size: 24px;
  line-height: 50px;
  height: 52px;
  padding: 0 15px;
  font-family: inherit;
  cursor: pointer;
  display: inline-block;
  text-decoration: none;
}

.resp-pt button::-moz-focus-inner {
  border: 0;
  padding: 0;
  margin: 0;
}

.resp-pt .pt-list {
  list-style: none;
  margin: 0;
  padding: 20px 0 0;
  display: inline-block;
  text-align: left;
}

.resp-pt .pt-list li {
  list-style: none;
  display: block;
  margin: 0;
  padding: 10px 0 5px;
}

.resp-pt .pt-list .fa {
  width: 25px;
  font-size: 21px;
}
</style>
@endsection