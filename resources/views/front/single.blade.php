@extends('layouts.front')
@section('title')
Single
@endsection
@section('content')
<div class="breadcrumbs">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 col-md-6 col-12">
<div class="breadcrumbs-content">
<h1 class="page-title">{{$product->name}}</h1>
</div>
</div>
<div class="col-lg-6 col-md-6 col-12">
<ul class="breadcrumb-nav">
<li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
<li><a href="index.html">Shop</a></li>
<li>Single Product</li>
</ul>
</div>
</div>
</div>
</div>


<section class="item-details section">
<div class="container">
<div class="top-area">
<div class="row align-items-center">
<div class="col-lg-6 col-md-12 col-12">
<div class="product-images">
<main id="gallery">
<div class="main-img">
<img src="{{asset('assets/uploads/product/'.$product->image[0])}}" id="current" alt="#">
</div>
@php
if(is_countable($product->image) && count($product->image) > 1) {
    $num=count($product->image);
}else{
    $num=0;
}
    
@endphp
<div class="images">
    @for ($i = 0; $i < $num; $i++)
        <img src="{{asset('assets/uploads/product/'.$product->image[$i])}}" class="img" alt="#">
    @endfor
</div>
</main>
</div>
</div>
<div class="col-lg-6 col-md-12 col-12">
<div class="product-info product_data">
<h2 class="title">{{$product->name}}</h2>
<p class="category"><i class="lni lni-tag"></i><a href="/get-category/{{$product->category->id}}">{{$product->category->name}}</a></p>
<div class="price">
    <h3 class="price">{{ $product->s_price }}</h3>
</div>
<p class="info-text">{{$product->disc}}.</p>
<div class="row">
<div class="col-lg-4 col-md-4 col-12">
<div class="form-group color-option">
<label class="title-label" for="size">Choose color</label>
<div class="single-checkbox checkbox-style-1">
<input type="checkbox" id="checkbox-1" checked>
<label for="checkbox-1"><span></span></label>
</div>
<div class="single-checkbox checkbox-style-2">
<input type="checkbox" id="checkbox-2">
<label for="checkbox-2"><span></span></label>
</div>
<div class="single-checkbox checkbox-style-3">
<input type="checkbox" id="checkbox-3">
<label for="checkbox-3"><span></span></label>
</div>
<div class="single-checkbox checkbox-style-4">
<input type="checkbox" id="checkbox-4">
<label for="checkbox-4"><span></span></label>
</div>
</div>
</div>
<div class="col-lg-4 col-md-4 col-12">
<div class="form-group quantity">
<input type="hidden" value="{{$product->id}}" class="prod_id" >
<input type="hidden"  value="{{$product->qty}}" class="o-qty" >
<label for="color">Quantity</label>
<select class="form-control qty">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>
</div>
</div>
</div>
<div class="bottom-content">
<div class="row align-items-end">
<div class="col-lg-4 col-md-4 col-12">
<div class="button cart-button">
    @if ($product->qty > 0)
        <button class="btn addToCart " style="width: 100%;">Add to Cart</button> 
    @else
        {{-- <label class="btn bg-danger">Out Of Stock</label> --}}
        <button class="btn btn-danger"><i class="lni lni-reload"></i> Out Of Stock</button>
    @endif
</div>
</div>
{{-- <div class="col-lg-4 col-md-4 col-12">
<div class="wish-button">
<button class="btn"><i class="lni lni-reload"></i> Compare</button>
</div>
</div> --}}
<div class="col-lg-4 col-md-4 col-12">
<div class="wish-button">
<button class="btn addToWishlist"><i class="lni lni-heart"></i> Add to Wishlist</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="product-details-info">
<div class="single-block">
<div class="row">
<div class="col-lg-6 col-12">
<div class="info-body custom-responsive-margin">
<h4>Details</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</p>
<h4>Features</h4>
<ul class="features">
<li>Capture 4K30 Video and 12MP Photos</li>
<li>Game-Style Controller with Touchscreen</li>
<li>View Live Camera Feed</li>
<li>Full Control of HERO6 Black</li>
<li>Use App for Dedicated Camera Operation</li>
</ul>
</div>
</div>
<div class="col-lg-6 col-12">
<div class="info-body">
<h4>Specifications</h4>
<ul class="normal-list">
<li><span>Weight:</span> 35.5oz (1006g)</li>
<li><span>Maximum Speed:</span> 35 mph (15 m/s)</li>
<li><span>Maximum Distance:</span> Up to 9,840ft (3,000m)</li>
<li><span>Operating Frequency:</span> 2.4GHz</li>
<li><span>Manufacturer:</span> GoPro, USA</li>
</ul>
<h4>Shipping Options:</h4>
<ul class="normal-list">
<li><span>Courier:</span> 2 - 4 days, $22.50</li>
<li><span>Local Shipping:</span> up to one week, $10.00</li>
<li><span>UPS Ground Shipping:</span> 4 - 6 days, $18.00</li>
<li><span>Unishop Global Export:</span> 3 - 4 days, $25.00</li>
</ul>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-4 col-12">
<div class="single-block give-review">
<h4>{{$product->rate}} (Overall)</h4>
<ul>
<li>
    @php
    $i1=0;
    foreach ( $rating as $item)
    {   if($item->stars_rated == 5){$i1++ ;}}
    @endphp
<span>5 stars - {{$i1}}</span>
<i class="lni lni-star-filled"></i>
<i class="lni lni-star-filled"></i>
<i class="lni lni-star-filled"></i>
<i class="lni lni-star-filled"></i>
<i class="lni lni-star-filled"></i>
</li>
<li>
    @php
    $i2=0;
    foreach ( $rating as $item)
    {   if($item->stars_rated == 4){$i2++ ;}}
    @endphp
<span>4 stars - {{$i2}}</span>
<i class="lni lni-star-filled"></i>
<i class="lni lni-star-filled"></i>
<i class="lni lni-star-filled"></i>
<i class="lni lni-star-filled"></i>
<i class="lni lni-star"></i>
</li>
<li>
    @php
    $i3=0;
    foreach ( $rating as $item)
    {   if($item->stars_rated == 3){$i3++ ;}}
    @endphp
<span>3 stars - {{$i3}}</span>
<i class="lni lni-star-filled"></i>
<i class="lni lni-star-filled"></i>
<i class="lni lni-star-filled"></i>
<i class="lni lni-star"></i>
<i class="lni lni-star"></i>
</li>
<li>
    @php
    $i4=0;
    foreach ( $rating as $item)
    {   if($item->stars_rated == 2){$i4++ ;}}
    @endphp
<span>2 stars - {{$i4}}</span>
<i class="lni lni-star-filled"></i>
<i class="lni lni-star-filled"></i>
<i class="lni lni-star"></i>
<i class="lni lni-star"></i>
<i class="lni lni-star"></i>
</li>
<li>
    @php
    $i5=0;
    foreach ( $rating as $item)
    {   if($item->stars_rated == 1){$i5++ ;}}
    @endphp
<span>1 star - {{$i5}}</span>
<i class="lni lni-star-filled"></i>
<i class="lni lni-star"></i>
<i class="lni lni-star"></i>
<i class="lni lni-star"></i>
<i class="lni lni-star"></i>
</li>
</ul>

<button type="button" class="btn review-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
Leave a Review
</button>
</div>
</div>
<div class="col-lg-8 col-12">
<div class="single-block">
<div class="reviews">
<h4 class="title">Latest Reviews</h4>
@foreach ($rating as $item)
<div class="single-review">
    <img src="assets/images/blog/comment1.jpg" alt="#">
    <div class="review-info">
    <h4>{{$item->sub}}
    <span>{{$item->user->name}}
    </span>
    </h4>
    <ul class="stars">
    @for ($i = 1; $i <= $item->stars_rated; $i++)
    <li><i class="lni lni-star-filled"></i></li>
    @endfor
    @for ($j = $item->stars_rated; $j < 5; $j++)
    <li><i class="lni lni-star"></i></li>     
    @endfor
    </ul>
    <p>{{$item->desc}}...</p>
    </div>
    </div>
@endforeach

</div>
</div>
</div>
</div>
</div>
</div>
</section>


<div class="modal fade review-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Leave a Review</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-sm-6">
<form method="POST" action="{{url('add-rating/'.$product->id)}}">
@csrf
<div class="form-group">
<label for="review-name">Your Name</label>
<input class="form-control" value="" name="name" type="text" id="review-name" required>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="review-email">Your Email</label>
<input class="form-control" value="" name="email" type="email" id="review-email" required>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for="review-subject">Subject</label>
<input class="form-control" name="sub" type="text" id="review-subject" required>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="review-rating">Rating</label>
<select name="rate" class="form-control" id="review-rating">
<option  value="5">5 Stars</option>
<option value="4">4 Stars</option>
<option value="3">3 Stars</option>
<option value="2">2 Stars</option>
<option value="1">1 Star</option>
</select>
</div>
</div>
</div>
<div class="form-group">
<label for="review-message">Review</label>
<textarea class="form-control" name="desc" id="review-message" rows="8" required></textarea>
</div>
</div>
<div class="modal-footer button">
<button type="submit" class="btn">Submit Review</button>
</form>
</div>
</div>
</div>
</div>
@endsection
@push('javascript')
<script>
    const current = document.getElementById("current");
const opacity = 0.6;
const imgs = document.querySelectorAll(".img");
imgs.forEach(img => {
img.addEventListener("click", (e) => {
    //reset opacity
    imgs.forEach(img => {
        img.style.opacity = 1;
    });
    current.src = e.target.src;
    //adding class 
    //current.classList.add("fade-in");
    //opacity
    e.target.style.opacity = opacity;
});
});
</script>
@endpush