@extends('layouts.front')
@section('title')
    {{Auth::user()->name}} - E-Shop
@endsection
@section('content')
    <div class="breadcrumbs">
    <div class="container">
    <div class="row align-items-center">
    <div class="col-lg-6 col-md-6 col-12">
    <div class="breadcrumbs-content">
    <h1 class="page-title">Profile</h1>
    </div>
    </div>
    <div class="col-lg-6 col-md-6 col-12">
    <ul class="breadcrumb-nav">
    <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
    <li>Profile</li>
    </ul>
    </div>
    </div>
    </div>
    </div>
    <div class="container">
        @include('user.layouts.profile')
    </div>
@endsection