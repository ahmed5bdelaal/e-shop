@extends('layouts.front')
@section('title')
Products - E-Shop
@endsection
@section('content')
<div class="breadcrumbs">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 col-md-6 col-12">
<div class="breadcrumbs-content">
<h1 class="page-title">Products</h1>
</div>
</div>
<div class="col-lg-6 col-md-6 col-12">
<ul class="breadcrumb-nav">
<li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
<li><a href="javascript:void(0)">Shop</a></li>
<li>Products</li>
</ul>
</div>
</div>
</div>
</div>


<section class="product-grids section">
<div class="container">
<div class="row">
<div class="col-lg-3 col-12">

<div class="product-sidebar">

<div class="single-widget">
<h3>All Categories</h3>
<ul class="list">
    @foreach ($categorys as $item)
    <li>
        <a href="get-category/{{$item->id}}">{{$item->name}}</a><span>({{$item->product->count()}})</span>
    </li>  
    @endforeach
</ul>
</div>


<div class="single-widget range">
<h3>Sort by</h3>
<ul class="list">
    <li>
        <a href="{{URL::current()}}">All</a></span>
    </li>
    <li>
        <a href="{{URL::current()."?sort=popularity"}}">Popularity</a></span>
    </li>
    <li>
        <a href="{{URL::current()."?sort=price_asc"}}">Low - High Price</a></span>
    </li>
    <li>
        <a href="{{URL::current()."?sort=price_desc"}}">High - Low Price</a></span>
    </li>
    <li>
        <a href="{{URL::current()."?sort=newest"}}">Newest</a></span>
    </li>
</ul>
</div>


<div class="single-widget condition">
<h3>Filter by Price</h3>
<form action="{{URL::current()}}" id="formId" method="GET">
<div class="form-check">
<input class="form-check-input" name="a" type="checkbox" value="50-100" id="submitButton">
<label class="form-check-label" for="flexCheckDefault1">
$50 - $100L (208)
</label>
</div>
<div class="form-check">
<input class="form-check-input" name="a" type="checkbox" value="100-500" id="submitButton">
<label class="form-check-label" for="flexCheckDefault2">
$100L - $500 (311)
</label>
</div>
<div class="form-check">
<input class="form-check-input" name="a" type="checkbox" value="500-1000" id="submitButton">
<label class="form-check-label" for="flexCheckDefault3">
$500 - $1,000 (485)
</label>
</div>
<div class="form-check">
<input class="form-check-input" name="a" type="checkbox" value="1000-5000" id="submitButton">
<label class="form-check-label" for="flexCheckDefault4">
$1,000 - $5,000 (213)
</label>
</div>

</div>


<div class="single-widget condition">
<h3>Filter by Brand</h3>
@foreach ($brands as $item)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="brand" value="{{$item->id}}" id="flexCheckDefault11">
        <label class="form-check-label" for="flexCheckDefault11">
        {{$item->title}} ({{$item->products->count()}})
        </label>
    </div>
@endforeach
</div>
<button type="submit" class="btn btn-primary">filter</button>
</form>
</div>

</div>
<div class="col-lg-9 col-12">
<div class="product-grids-head">
<div class="product-grid-topbar">
<div class="row align-items-center">
<div class="col-lg-7 col-md-8 col-12">
<div class="product-sorting">

<h3 class="total-show-product">Showing: <span>1 - 12 items</span></h3>
</div>
</div>
<div class="col-lg-5 col-md-4 col-12">
<nav>
<div class="nav nav-tabs" id="nav-tab" role="tablist">
<button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true"><i class="lni lni-grid-alt"></i></button>
<button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false"><i class="lni lni-list"></i></button>
</div>
</nav>
</div>
</div>
</div>
<div class="tab-content" id="nav-tabContent">
<div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
<div class="row">
@foreach ($products as $item)
<div class="col-lg-3 col-md-6 col-12">
    <div class="single-product product_data">
    <div class="product-image">
    <img src="{{asset('assets/uploads/product/'.$item->image[0])}}" alt="#">
    <div class="button">
    <button class="btn addToCart"><i class="lni lni-cart"></i> Add to Cart</button>
    <input type="hidden" value="{{$item->id}}" class="prod_id" >
    <input type="hidden" value="1" class="qty" >
    <input type="hidden"  value="{{$item->qty}}" class="o-qty" >
    </div>
    </div>
     <div class="product-info">
    <span class="category">{{$item->category->name}}</span>
    <h4 class="title">
    <a href="/get-product/{{$item->id}}">{{$item->name}}</a>
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
        @php
        if($item->dis){
            $dis=$item->s_price*$item->offer/100;
            echo '<span>$'.$dis.'</span>';
        }
    @endphp
    <span class="discount-price">${{$item->s_price}}</span>
    </div>
    </div>
    </div>
    </div> 
@endforeach
</div>
<div class="row">
<div class="col-12">

<div class="pagination left">
<ul class="pagination-list">
{{ $products->links() }}
</ul>
</div>

</div>
</div>
</div>
<div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
<div class="row">
    @foreach ($products as $item)
<div class="col-lg-12 col-md-12 col-12">

<div class="single-product product_data">
<div class="row align-items-center">
<div class="col-lg-4 col-md-4 col-12">
<div class="product-image">
    <a href="get-product/{{$item->id}}"><img src="{{asset('assets/uploads/product/'.$item->image[0])}}" alt="#"></a>
<div class="button">
<button class="btn addToCart"><i class="lni lni-cart"></i> Add to
Cart</button>
<input type="hidden" value="{{$item->id}}" class="prod_id" >
<input type="hidden" value="1" class="qty" >
<input type="hidden"  value="{{$item->qty}}" class="o-qty" >
</div>
</div>
</div>
<div class="col-lg-8 col-md-8 col-12">
<div class="product-info">
<span class="category">{{$item->category->name}}</span>
<h4 class="title">
    <a href="/get-product/{{$item->id}}">{{$item->name}}</a>
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
</div>

</div>
@endforeach
</div>
<div class="row">
<div class="col-12">

<div class="pagination left">
<ul class="pagination-list">
    {{ $products->links() }}
</ul>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

@endsection