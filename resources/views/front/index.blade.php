@extends('layouts.front')
@section('content')
<section class="hero-area">
<div class="container">
<div class="row">
<div class="col-lg-8 col-12 custom-padding-right">
<div class="slider-head">

<div class="hero-slider">

<div class="single-slider" style="background-image: url({{ asset('assets/images/hero/slider-bg1.jpg') }});">
<div class="content">
<h2><span>No restocking fee ($35 savings)</span>
M75 Sport Watch
</h2>
<p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut
labore dolore magna aliqua.</p>
<h3><span>Now Only</span> $320.99</h3>
<div class="button">
<a href="product-grids.html" class="btn">Shop Now</a>
</div>
</div>
</div>


<div class="single-slider"  style="background-image: url({{ asset('assets/images/hero/slider-bg2.jpg') }});">
<div class="content">
<h2><span>Big Sale Offer</span>
Get the Best Deal on CCTV Camera
</h2>
<p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut
labore dolore magna aliqua.</p>
<h3><span>Combo Only:</span> $590.00</h3>
<div class="button">
<a href="product-grids.html" class="btn">Shop Now</a>
</div>
</div>
</div>

</div>

</div>
</div>
<div class="col-lg-4 col-12">
<div class="row">
<div class="col-lg-12 col-md-6 col-12 md-custom-padding">

<div class="hero-small-banner" style="background-image: url({{ asset('assets/images/hero/slider-bnr.jpg') }});">
<div class="content">
<h2>
<span>New line required</span>
iPhone 12 Pro Max
</h2>
<h3>$259.99</h3>
</div>
</div>

</div>
<div class="col-lg-12 col-md-6 col-12">

<div class="hero-small-banner style2">
<div class="content">
<h2>Weekly Sale!</h2>
 <p>Saving up to 50% off all online store items this week.</p>
<div class="button">
<a class="btn" href="product-grids.html">Shop Now</a>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</section>


<section class="featured-categories section">
<div class="container">
<div class="row">
<div class="col-12">
<div class="section-title">
<h2>Featured Categories</h2>
<p>There are many variations of passages of Lorem Ipsum available, but the majority have
suffered alteration in some form.</p>
</div>
</div>
</div>
<div class="row">
    @foreach ($categorys as $item)
            <div class="col-lg-4 col-md-6 col-12">
            <div class="single-category">
            <h3 class="heading">{{$item->name}}</h3>
            <ul>
            <li><a href="product-grids.html">Smart Television</a></li>
            <li><a href="product-grids.html">QLED TV</a></li>
            <li><a href="product-grids.html">Audios</a></li>
            <li><a href="product-grids.html">Headphones</a></li>
            <li><a href="product-grids.html">View All</a></li>
            </ul>
            <div class="images">
            <img src="{{asset('assets/uploads/category/'.$item->image)}}" style="max-width: 201px" alt="#">
            </div>
            </div>
            </div>
    @endforeach
</div>
</div>
</section>


<section class="trending-product section">
<div class="container">
<div class="row">
<div class="col-12">
<div class="section-title">
<h2>Trending Product</h2>
<p>There are many variations of passages of Lorem Ipsum available, but the majority have
suffered alteration in some form.</p>
</div>
</div>
</div>
<div class="row">
@foreach ($products as $item)
<div class="col-lg-3 col-md-6 col-12">
    <div class="single-product product_data">
    <div class="product-image">
    <a href="get-product/{{$item->id}}">
    <img src="{{asset('assets/uploads/product/'.$item->image[0])}}" alt="#">
    </a>
    <div class="button">
    <button class="btn addToCart"><i class="lni lni-cart"></i> Add to Cart</button>
    <input type="hidden" value="{{$item->id}}" class="prod_id" >
    <input type="hidden"  value="1" class="qty" >
    <input type="hidden"  value="{{$item->qty}}" class="o-qty" >
    </div>
    </div>
     <div class="product-info">
    <span class="category">{{$item->category->name}}</span>
    <h4 class="title">
    <a href="get-product/{{$item->id}}">{{$item->name}}</a>
    </h4>
    <ul class="review">
        @for ($i = 1; $i <= $item->rate; $i++)
        <li><i class="lni lni-star-filled"></i></li>
        @endfor
        @for ($j = $item->rate; $j < 5; $j++)
        <li><i class="lni lni-star"></i></li>     
        @endfor
    <li><span>{{$item->rating->count()}} Review(s)</span></li>
    </ul>
    <div class="price">
    <span>${{$item->s_price}}</span>
    </div>
    </div>
    </div>
    </div> 
@endforeach
</div>
</div>
</section>


<section class="banner section">
<div class="container">
<div class="row">
<div class="col-lg-6 col-md-6 col-12">
<div class="single-banner" style="background-image:url({{ asset('assets/images/banner/banner-1-bg.jpg') }})">
<div class="content">
<h2>Smart Watch 2.0</h2>
<p>Space Gray Aluminum Case with <br>Black/Volt Real Sport Band </p>
<div class="button">
<a href="product-grids.html" class="btn">View Details</a>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6 col-12">
<div class="single-banner custom-responsive-margin" style="background-image:url({{ asset('assets/images/banner/banner-2-bg.jpg') }})">
<div class="content">
<h2>Smart Headphone</h2>
<p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
incididunt ut labore.</p>
<div class="button">
<a href="product-grids.html" class="btn">Shop Now</a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="special-offer section">
<div class="container">
<div class="row">
<div class="col-12">
<div class="section-title">
<h2>Special Offer</h2>
<p>There are many variations of passages of Lorem Ipsum available, but the majority have
suffered alteration in some form.</p>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-8 col-md-12 col-12">
<div class="row">
    @foreach ($dis as $item)
<div class="col-lg-4 col-md-4 col-12">

<div class="single-product product_data">
    <div class="product-image">
    <a href="get-product/{{$item->id}}">
    <img src="{{asset('assets/uploads/product/'.$item->image[0])}}" alt="#">
    </a>
    <div class="button">
    <button class="btn addToCart"><i class="lni lni-cart"></i> Add to Cart</button>
    <input type="hidden" value="{{$item->id}}" class="prod_id" >
    <input type="hidden"  value="1" class="qty" >
    <input type="hidden"  value="{{$item->qty}}" class="o-qty" >
    </div>
    </div>
     <div class="product-info">
    <span class="category">{{$item->category->name}}</span>
    <h4 class="title">
    <a href="get-product/{{$item->id}}">{{$item->name}}</a>
    </h4>
    <ul class="review">
        @for ($i = 1; $i <= $item->rate; $i++)
        <li><i class="lni lni-star-filled"></i></li>
        @endfor
        @for ($j = $item->rate; $j < 5; $j++)
        <li><i class="lni lni-star"></i></li>     
        @endfor
    <li><span>{{$item->rating->count()}} Review(s)</span></li>
    </ul>
    <div class="price">
        <span>${{ $item->s_price }}</span>
        <span class="price">%{{$item->offer}}</span>
    </div>
    </div>
    </div>
    </div> 
@endforeach

</div>

</div>
</div>
</section>


<section class="home-product-list section">
<div class="container">
<div class="row">
<div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
<h4 class="list-title">Best Sellers</h4>

    @foreach ($bestSelling as $item)
        @php
            $product=App\Models\Product::where('id',$item->prod_id)->first();
        @endphp
        <div class="single-list">
            <div class="list-image">
            <a href="get-product/{{$product->id}}"><img src="{{asset('assets/uploads/product/'.$product->image[0])}}" alt="#"></a>
            </div>
            <div class="list-info">
            <h3>
            <a href="get-product/{{$product->id}}">{{$product->name}}</a>
            </h3>
            <span>${{$product->o_price}}</span>
            </div>
        </div>
    @endforeach

</div>
<div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
<h4 class="list-title">New Arrivals</h4>
@foreach ($new as $item)
<div class="single-list">
    <div class="list-image">
    <a href="get-product/{{$item->id}}"><img src="{{asset('assets/uploads/product/'.$item->image[0])}}" alt="#"></a>
    </div>
    <div class="list-info">
    <h3>
    <a href="get-product/{{$item->id}}">{{$item->name}}</a>
    </h3>
    <span>${{$item->o_price}}</span>
    </div>
    </div>
@endforeach
</div>
<div class="col-lg-4 col-md-4 col-12">
<h4 class="list-title">Top Rated</h4>

@foreach ($top as $item)
<div class="single-list">
    <div class="list-image">
    <a href="get-product/{{$item->id}}"><img src="{{asset('assets/uploads/product/'.$item->image[0])}}" alt="#"></a>
    </div>
    <div class="list-info">
    <h3>
    <a href="get-product/{{$item->id}}">{{$item->name}}</a>
    </h3>
    <span>${{$item->o_price}}</span>
    </div>
    </div>
@endforeach

</div>
</div>
</div>
</section>


<div class="brands">
<div class="container">
<div class="row">
<div class="col-lg-6 offset-lg-3 col-md-12 col-12">
<h2 class="title">Popular Brands</h2>
</div>
</div>
<div class="brands-logo-wrapper">
<div class="brands-logo-carousel d-flex align-items-center justify-content-between">
    @foreach ($brands as $item)
    <div class="brand-logo">
        <img src="{{asset('assets/uploads/brand/'.$item->photo)}}" alt="#">
        </div>
    @endforeach
 </div>
</div>
</div>
</div>


<section class="shipping-info">
<div class="container">
<ul>

<li>
<div class="media-icon">
<i class="lni lni-delivery"></i>
</div>
<div class="media-body">
<h5>Free Shipping</h5>
<span>On order over $99</span>
</div>
</li>

<li>
<div class="media-icon">
<i class="lni lni-support"></i>
</div>
<div class="media-body">
<h5>24/7 Support.</h5>
<span>Live Chat Or Call.</span>
</div>
</li>

<li>
<div class="media-icon">
<i class="lni lni-credit-cards"></i>
</div>
<div class="media-body">
<h5>Online Payment.</h5>
<span>Secure Payment Services.</span>
</div>
</li>

<li>
<div class="media-icon">
<i class="lni lni-reload"></i>
</div>
<div class="media-body">
<h5>Easy Return.</h5>
<span>Hassle Free Shopping.</span>
</div>
</li>
</ul>
</div>
</section>

@endsection
@push('javascript')
<script>
    tns({
    container: '.brands-logo-carousel',
    autoplay: true,
    autoplayButtonOutput: false,
    mouseDrag: true,
    gutter: 15,
    nav: false,
    controls: false,
    responsive: {
        0: {
            items: 1,
        },
        540: {
            items: 3,
        },
        768: {
            items: 5,
        },
        992: {
            items: 6,
        }
    }
});
</script>
<script>
    tns({
    container: '.hero-slider',
    slideBy: 'page',
    autoplay: true,
    autoplayButtonOutput: false,
    mouseDrag: true,
    gutter: 0,
    items: 1,
    nav: false,
    controls: true,
    controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
});
</script>

@endpush