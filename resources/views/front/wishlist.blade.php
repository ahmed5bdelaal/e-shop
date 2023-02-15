@extends('layouts.front')
@section('title')
Wishlist
@endsection
@section('content')
<div class="breadcrumbs">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 col-md-6 col-12">
<div class="breadcrumbs-content">
<h1 class="page-title">Wishlist</h1>
</div>
</div>
<div class="col-lg-6 col-md-6 col-12">
<ul class="breadcrumb-nav">
<li><a href="/"><i class="lni lni-home"></i> Home</a></li>
<li><a href="/">Shop</a></li>
<li>Wishlist</li>
</ul>
</div>
</div>
</div>
</div>


<div class="shopping-cart section items-prod">
<div class="container">
<div class="cart-list-head ">

<div class="cart-list-title">
<div class="row">
<div class="col-lg-1 col-md-1 col-12">
</div>
<div class="col-lg-4 col-md-3 col-12">
<p>Product</p>
</div>
<div class="col-lg-2 col-md-2 col-12">
<p>add to cart</p>
</div>
<div class="col-lg-2 col-md-2 col-12">
<p>Total</p>
</div>
<div class="col-lg-1 col-md-2 col-12">
<p>Remove</p>
</div>
</div>
</div>
<div class="cart-single-list p_data">
@if ($wishlist->count() > 0)
@foreach ($wishlist as $item)
    <div class="row align-items-center product_data">
    <div class="col-lg-1 col-md-1 col-12">
    <a href="/get-product/{{$item->id}}"><img src="{{asset('assets/uploads/product/'.$item->product->name($item->product->id))}}" alt="#"></a>
    </div>
    <div class="col-lg-4 col-md-3 col-12">
    <h5 class="product-name"><a href="/get-product/{{$item->id}}">
    {{$item->product->name}}</a></h5>
    <p class="product-des">
        {{$item->product->s_disc}}
    </p>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <div class="count-input">
        <div class="button">
            <button class="btn addToCart"><i class="lni lni-cart"></i> Add to Cart</button>
            <input type="hidden" value="{{$item->product->id}}" class="prod_id" >
            <input type="hidden"  value="1" class="qty" >
            <input type="hidden"  value="{{$item->product->qty}}" class="o-qty" >
        </div>
    </div>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <p>${{$item->product->s_price}}</p>
    </div>
    <div class="col-lg-1 col-md-2 col-12">
    <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
    <a href="#" class="remove-item remove-wishlist"><i class="lni lni-close"></i></a>
    </div>
    </div> 
@endforeach
@else
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-3 col-12">
        </div>
        <div class="col-lg-4 col-md-3 col-12">
            <h3>No Products</h3>
        </div>
    </div>
@endif
</div>
</div>
    <div class="button">
        <a href="/c-shop" class="btn btn-alt">Continue shopping</a>
    </div>
</div>
</div>
@endsection