@extends('layouts.front')
@section('content')
<div class="error-area">
<div class="d-table">
<div class="d-table-cell">
<div class="container">
<div class="error-content">
<h1>@yield('code')</h1>
<h2>Oops!</h2>
<p>@yield('message')</p>
<div class="button">
<a href="{{url('/')}}" class="btn">Back to Home</a>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection

