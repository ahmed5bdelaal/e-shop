
<header class="header navbar-area">

<div class="topbar">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-4 col-md-4 col-12">
<div class="top-left">
<ul class="menu-top-link">
<li>
<div class="select-position">
<select id="select4">
<option value="0" selected>$ USD</option>
<option value="1">€ EURO</option>
<option value="2">$ CAD</option>
<option value="3">₹ INR</option>
<option value="4">¥ CNY</option>
<option value="5">৳ BDT</option>
</select>
</div>
</li>
<li>
<div class="select-position">
<select id="select5">
<option value="0" selected>English</option>
<option value="1">Español</option>
<option value="2">Filipino</option>
<option value="3">Français</option>
<option value="4">العربية</option>
<option value="5">हिन्दी</option>
<option value="6">বাংলা</option>
</select>
</div>
</li>
</ul>
</div>
</div>
<div class="col-lg-4 col-md-4 col-12">
<div class="top-middle">
<ul class="useful-links">
<li><a href="/">Home</a></li>
<li><a href="about">About Us</a></li>
<li><a href="contact">Contact Us</a></li>
</ul>
</div>
</div>
<div class="col-lg-4 col-md-4 col-12">
<div class="top-end">
<ul class="user-login">
  @guest
      <li>
      <a href="/login">Sign In</a>
      </li>
      <li>
      <a href="/register">Register</a>
      </li>
  @else
  <li>
    <div class="user">
    <i class="lni lni-user"></i>
    <a href="profile">
      {{ Auth::user()->name }}
    </a>
    </div>
  </li>
    <li>
      <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
    </li>
  @endguest
</ul>
</div>
</div>
</div>
</div>
</div>


<div class="header-middle">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-3 col-md-3 col-7">

<a class="navbar-brand" href="/">
<img src="{{asset('assets/images/logo/'.$settings->logo)}}" alt="Logo">
</a>

</div>
<div class="col-lg-5 col-md-7 d-xs-none">

<div class="main-menu-search">

<div class="navbar-search search-style-5">

<div class="search-input">
<form action="{{url('search')}}" method="post">
  @csrf
<input type="Search" name="searched" id="search-product" required placeholder="Search">
</div>
<div class="search-btn">
<button type="submit"><i class="lni lni-search-alt"></i></button>
</form>
</div>
</div>

</div>

</div>
<div class="col-lg-4 col-md-2 col-5">
<div class="middle-right-area">
<div class="nav-hotline">
<i class="lni lni-phone"></i>
<h3>Hotline:
<span>(+20) {{ $settings->phone }}</span>
</h3>
</div>
<div class="navbar-cart">
<div class="wishlist">
<a href="#">
<i class="lni lni-heart"></i>
<span class="total-items">0</span>
</a>
</div>
<div class="cart-items">
<a href="{{url('cart')}}" class="main-btn">
<i class="lni lni-cart"></i>
 <span class="total-items count-cart">0</span>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="container">
<div class="row align-items-center">
<div class="col-lg-8 col-md-6 col-12">
<div class="nav-inner">

<div class="mega-category-menu">
<span class="cat-button"><i class="lni lni-menu"></i>All Categories</span>
<ul class="sub-category">
@foreach ($categorys as $item)
  <li><a href="all-products?category={{$item->id}}">{{$item->name}}</a></li>
@endforeach
</ul>
</div>


<nav class="navbar navbar-expand-lg">
<button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="toggler-icon"></span>
<span class="toggler-icon"></span>
<span class="toggler-icon"></span>
</button>
<div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
<ul id="nav" class="navbar-nav ms-auto">
<li class="nav-item">
<a href="/" class="{{Request::is('/') ? 'active' : '';}}" aria-label="Toggle navigation">Home</a>
</li>
<li class="nav-item">
  <a href="/all-products" class="{{Request::is('/all-products') ? 'active' : '';}}">Products</a>
  </li>
<li class="nav-item">
  <a href="/my-orders" class="{{Request::is('/my-orders') ? 'active' : '';}}">Orders</a>
</li>
<li class="nav-item">
  <a href="/cart" class="{{Request::is('/cart') ? 'active' : '';}}">Cart</a>
</li>
</ul>
</div> 
</nav>

</div>
</div>
<div class="col-lg-4 col-md-6 col-12">

<div class="nav-social">
<h5 class="title">Follow Us:</h5>
<ul>
<li>
<a href="https://www.facebock.com/{{ $settings->facebock }}"><i class="lni lni-facebook-filled"></i></a>
</li>
<li>
<a href="https://www.twitter.com/{{ $settings->twitter }}"><i class="lni lni-twitter-original"></i></a>
</li>
<li>
<a href="https://www.instagram.com/{{ $settings->instagram }}"><i class="lni lni-instagram"></i></a>
</li>
<li>
<a href="https://www.google.com/{{ $settings->google }}"><i class="lni lni-google"></i></a>
</li>
</ul>
</div>

</div>
</div>
</div>

</header>