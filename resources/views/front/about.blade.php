@extends('layouts.front')
@section('title')
  About Us
@endsection
@section('content')
<div class="breadcrumbs">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 col-md-6 col-12">
<div class="breadcrumbs-content">
<h1 class="page-title">About Us</h1>
</div>
</div>
<div class="col-lg-6 col-md-6 col-12">
<ul class="breadcrumb-nav">
<li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
<li>About Us</li>
</ul>
</div>
</div>
</div>
</div>


<section class="about-us section">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 col-md-12 col-12">
<div class="content-left">
<img src="assets/images/about/about-img.jpg" alt="#">
<a href="https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM" class="glightbox video"><i class="lni lni-play"></i></a>
</div>
</div>
<div class="col-lg-6 col-md-12 col-12">

<div class="content-right">
<h2>ShopGrids - Your Trusted & Reliable Partner.</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus
pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut
accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor. Mauris rutrum
fermentum erat, at euismod lorem pharetra nec. Duis erat lectus, ultrices euismod sagittis.
</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt
ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
laboris nisi aliquip ex ea commodo consequat.</p>
</div>
</div>
</div>
</div>
</section>


<section class="team section">
<div class="container">
<div class="row">
<div class="col-12">
<div class="section-title">
<h2 class="wow fadeInUp" data-wow-delay=".4s">Our Core Team</h2>
<p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
Ipsum available, but the majority have suffered alteration in some form.</p>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-3 col-md-6 col-12">

<div class="single-team">
<div class="image">
<img src="assets/images/team/01.jpg" alt="#">
</div>
<div class="content">
<div class="info">
<h3>Grace Wright</h3>
<h5>Founder, CEO</h5>
<ul class="social">
<li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
</li>
<li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
</li>
<li><a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
 </li>
</ul>
</div>
</div>
</div>

</div>
<div class="col-lg-3 col-md-6 col-12">

<div class="single-team">
<div class="image">
<img src="assets/images/team/02.jpg" alt="#">
</div>
<div class="content">
<div class="info">
<h3>Taylor Jackson</h3>
<h5>Financial Director</h5>
<ul class="social">
<li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
</li>
<li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
</li>
<li><a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
</li>
</ul>
</div>
</div>
</div>

</div>
<div class="col-lg-3 col-md-6 col-12">

<div class="single-team">
<div class="image">
<img src="assets/images/team/03.jpg" alt="#">
</div>
<div class="content">
<div class="info">
<h3>Quinton Cross</h3>
<h5>Marketing Director</h5>
<ul class="social">
<li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
</li>
<li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
</li>
<li><a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
</li>
</ul>
</div>
</div>
</div>

</div>
<div class="col-lg-3 col-md-6 col-12">

<div class="single-team">
<div class="image">
<img src="assets/images/team/04.jpg" alt="#">
</div>
<div class="content">
<div class="info">
<h3>Liana Mullen</h3>
<h5>Lead Designer</h5>
<ul class="social">
<li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
</li>
<li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
</li>
<li><a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
</li>
</ul>
</div>
</div>
</div>

</div>
</div>
</div>
</section>
@endsection

@push('javascript')
<script>
  GLightbox({
  'href': 'https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM',
  'type': 'video',
  'source': 'youtube', //vimeo, youtube or local
  'width': 900,
  'autoplayVideos': true,
});
</script>
@endpush