@extends('layouts.front')
@section('title')
Cart
@endsection
@section('content')
<div class="breadcrumbs">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 col-md-6 col-12">
<div class="breadcrumbs-content">
<h1 class="page-title">Cart</h1>
</div>
</div>
<div class="col-lg-6 col-md-6 col-12">
<ul class="breadcrumb-nav">
<li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
<li><a href="index.html">Shop</a></li>
<li>Cart</li>
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
<p>Product Name</p>
</div>
<div class="col-lg-2 col-md-2 col-12">
<p>Quantity</p>
</div>
<div class="col-lg-2 col-md-2 col-12">
<p>Subtotal</p>
</div>
<div class="col-lg-2 col-md-2 col-12">
<p>Total</p>
</div>
<div class="col-lg-1 col-md-2 col-12">
<p>Remove</p>
</div>
</div>
</div>
@php
    $total = 0;
@endphp
@if ($cart->count() > 0)
@foreach ($cart as $item)
<div class="cart-single-list p_data">
    <div class="row align-items-center">
    <div class="col-lg-1 col-md-1 col-12">
    <a href="/get-product/{{$item->id}}"><img src="{{asset('assets/uploads/product/'.$item->product->image[0])}}" alt="#"></a>
    </div>
    <div class="col-lg-4 col-md-3 col-12">
        <h5 class="product-name"><a href="/get-product/{{$item->id}}">
        {{$item->product->name}}
        </a></h5>
        <p class="product-des">
            {{$item->product->s_disc}}
        </p>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <div class="count-input">
    <input type="number" min="0" value="{{$item->prod_qty}}" class="form-control c-input">
    <input type="hidden" class="p-qty" value="{{$item->product->qty}}">
    </div>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <p>${{$item->product->s_price}}</p>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <p>${{$item->product->s_price * $item->prod_qty}}</p>
    </div>
    <div class="col-lg-1 col-md-2 col-12">
    <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
    <a href="#" class="remove-item remove-cart"><i class="lni lni-close"></i></a>
    </div>
    </div>
    </div>
    @php
        $total += $item->product->s_price * $item->prod_qty ;
    @endphp
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
<div class="row">
<div class="col-12">
@if ($cart->count() > 0)
<div class="total-amount">
<div class="row">
<div class="col-lg-8 col-md-6 col-12">
<div class="left">
<div class="coupon">
<form action="{{url('coupon-store')}}" method="POST">
    @csrf
<input name="code" placeholder="Enter Your Coupon">
<div class="button">
<button  class="btn">Apply Coupon</button>
</div>
</form>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 col-12">
<div class="right">
<ul>
    @php
        $ship = 10;
    @endphp
    <li>Shipping<span>$10</span></li>
    @php
        if(session()->has('coupon')){
            if (Session::get('coupon')['type']=='fixed') {
                $total_amount=$total-Session::get('coupon')['value'];
                echo '<li class="coupon_price" data-price="">You Save<span>$'.Session::get('coupon')['value'].'</span></li>';
            }else{
                $total_coupon=$total * Session::get('coupon')['value']/100;
                $total_amount=$total-$total_coupon;
              echo '<li class="coupon_price" data-price="">You Save<span>$'.$total_coupon.'</span></li>';
            }
        }
    @endphp
    @if(session()->has('coupon'))
        <li>Cart Subtotal<span>${{$total_amount}}</span></li>
        <li class="last">You Pay<span>${{$total_amount + $ship}}</span></li>
    @else
        <li>Cart Subtotal<span>${{$total}}</span></li>
        <li class="last">You Pay<span>${{$total + $ship}}</span></li>
    @endif
</ul>
<div class="button">
<a href="/checkout" class="btn">Checkout</a>
<a href="/c-shop" class="btn btn-alt">Continue shopping</a>
</div>
</div>
</div>
</div>
</div>
@endif
</div>
</div>
</div>
</div>
@endsection