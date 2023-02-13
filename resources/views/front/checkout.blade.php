@extends('layouts.front')
@section('title')
Checkout
@endsection
@section('content')
<div class="breadcrumbs">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 col-md-6 col-12">
<div class="breadcrumbs-content">
<h1 class="page-title">checkout</h1>
</div>
</div>
<div class="col-lg-6 col-md-6 col-12">
<ul class="breadcrumb-nav">
<li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
<li><a href="index.html">Shop</a></li>
<li>checkout</li>
</ul>
</div>
</div>
</div>
</div>


<section class="checkout-wrapper section">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="checkout-steps-form-style-1">
    <form role="form" action="{{url('/place-order')}}" method="POST" class="validation" data-cc-on-file="false"
    data-stripe-publishable-key="{{ env('STRIPE_KEY','pk_test_51Lwa1mLotAv2HWJvLmv7zUC5pwirJYZ1Z9jvrhueQpS8KQykzWf334Ua0bCA50h3Xze4ijbIdgEaglz0FqTcRG0R00cgN8aRYd') }}"
    id="payment-form">
        @csrf
<ul id="accordionExample">
<li>
<h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Your Personal Details </h6>
<section class="checkout-steps-form-content collapse show" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
<div class="row pp">
<div class="col-md-12">
<div class="single-form form-default">
<label>User Name</label>
<div class="row">
<div class="col-md-6 form-input form">
<input type="text" name="fname" class="fname" value="{{Auth::user()->name}}" placeholder="First Name" required>
</div>
<div class="col-md-6 form-input form">
<input type="text" name="lname" value="{{Auth::user()->lname}}" placeholder="Last Name" required>
</div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="single-form form-default">
<label>Email Address</label>
<div class="form-input form">
<input type="text" name="email" class="email" value="{{Auth::user()->email}}" placeholder="Email Address" required>
</div>
</div>
</div>
<div class="col-md-6">
<div class="single-form form-default">
<label>Phone Number</label>
<div class="form-input form">
<input type="text" name="phone" class="phone" value="{{Auth::user()->phone}}" placeholder="Phone Number" required>
</div>
</div>
</div>
<div class="col-md-12">
<div class="single-form form-default">
<label>Address</label>
<div class="form-input form">
<input type="text" name="address" value="{{Auth::user()->address}}" placeholder="Mailing Address" required>
</div>
</div>
</div>
<div class="col-md-6">
<div class="single-form form-default">
<label>City</label>
<div class="form-input form">
<input type="text" name="city" value="{{Auth::user()->city}}" placeholder="City" required>
</div>
</div>
</div>
<div class="col-md-6">
<div class="single-form form-default">
<label>Post Code</label>
<div class="form-input form">
<input type="text" name="code" value="{{Auth::user()->code}}" placeholder="Post Code" required>
</div>
</div>
</div>
<div class="col-md-6">
<div class="single-form form-default">
<label>Country</label>
<div class="form-input form">
<input type="text" name="country" value="{{Auth::user()->country}}" placeholder="Country" required>
</div>
</div>
</div>
<div class="col-md-6">
<div class="single-form form-default">
<label>Region/State</label>
<div class="form-input form">
    <input type="text" name="state" value="{{Auth::user()->state}}" placeholder="State" required>
    </div>
</div>
</div>
</div>
</section>
</li>
<li>
<section class="checkout-steps-form-content collapse" id="collapsefive" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
    <div class="row">
    <div class="col-12">
    <div class="checkout-payment-form">
        @if (Session::has('success'))
        <div class="alert alert-success text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif
    <div class="single-form form-default">
    <label>Cardholder Name</label>
    <div class="form-input form">
    <input type="text" placeholder="Cardholder Name">
    </div>
    </div>
    <div class="single-form form-default">
    <label>Card Number</label>
    <div class="form-input form">
    <input id="credit-input" type="text" class="card-num" placeholder="0000 0000 0000 0000">
    <img src="assets/images/payment/card.png" alt="card">
    </div>
    </div>
     <div class="payment-card-info">
    <div class="single-form form-default mm-yy">
    <label>Expiration</label>
    <div class="expiration d-flex">
    <div class="form-input form">
    <input type="text" class="card-expiry-month" placeholder="MM">
    </div>
    <div class="form-input form">
    <input type="text" class="card-expiry-year" placeholder="YYYY">
    </div>
    </div>
    </div>
    <div class="single-form form-default">
    <label>CVC/CVV <span><i class="mdi mdi-alert-circle"></i></span></label>
    <div class="form-input form">
    <input type="text" class="card-cvc" placeholder="***">
    </div>
    </div>
    </div>
    <div class='form-row row'>
        <div class='col-md-12 hide error form-group'>
            <div class='alert-danger alert'>Fix the errors before you begin.</div>
        </div>
    </div>
    <div class="single-form form-default button">
    </div>
    </div>
    </div>
    </div>
    </section>
</li>
<li>
<h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">Payment Info</h6>

</li>
</ul>
</div>
</div>
<div class="col-lg-4">
<div class="checkout-sidebar">
<div class="checkout-sidebar-coupon">
<p>Order Detalls</p>
<hr>
<table class="table table-striped table-bordered" >
    <thead>
        <tr>
            <th>Name</th>
            <th>Qty</th>
            <th>SubTotal</th>
        </tr>
    </thead>
    <tbody>
        @php
            $total = 0;
        @endphp
        @foreach ($cart as $item)
            <tr>
                <td>{{$item->product->name}}</td>
                <td>{{$item->prod_qty}}</td>
                <td>${{$item->product->s_price * $item->prod_qty}}</td>
            </tr>
            @php
                $total += $item->product->s_price * $item->prod_qty ;
            @endphp
        @endforeach
    </tbody>
</table>
</div>
<div class="checkout-sidebar-price-table mt-30">
<h5 class="title">Pricing Table</h5>
<div class="sub-total-price">
    <div class="total-price shipping">
        <p class="value">Shipping:</p>
        <p class="price">$10.00</p>
        </div>
        @php
        if(session()->has('coupon')){
            if (Session::get('coupon')['type']=='fixed') {
                $total_amount=$total-Session::get('coupon')['value'];
                echo '<div class="total-price shipping">
                <p class="value" >You Save</p><p class="price">'.Session::get('coupon')['value'].'</p>
                </div>';
            }else{
                $total_coupon=$total * Session::get('coupon')['value']/100;
                $total_amount=$total-$total_coupon;
                echo '<div class="total-price shipping">
                <p class="value" >You Save</p><p class="price">'.$total_coupon.'</p>
                </div>';
            }
        }
    @endphp
<div class="total-price">
<p class="value">SubTotal Price:</p>
@if(session()->has('coupon'))
<p class="price">${{$total_amount}}</p>
@php    $pay =$total_amount + 10;  @endphp
@else
<p class="price">${{$total}}</p>
@php    $pay =$total + 10;  @endphp
@endif
</div>

{{-- <div class="total-price discount">
<p class="value">Total Price:</p>
<p class="price">${{$total}}</p>
</div> --}}
</div>
<div class="total-payable">
<div class="payable-price">
<p class="value">Total Price:</p>
 <p class="price">${{$pay}}</p>
 <input type="hidden" class="bb" value="{{$pay}}" name="total">
</div>
</div>
<div class="price-table-btn button">
<button type="submit" class="btn btn-alt bu">pay Order</button>
</div>
</div>
</form>
<div class="checkout-sidebar-banner mt-30">
<a href="product-grids.html">
<img src="assets/images/banner/banner.jpg" alt="#">
</a>
</div>
</div>
</div>
</div>
</div>
</section>

@endsection
@section('script')
@endsection