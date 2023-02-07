@extends('layouts.front')
@section('title')
Contact Us - E-Shop
@endsection
@section('content')
<div class="breadcrumbs">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 col-md-6 col-12">
<div class="breadcrumbs-content">
<h1 class="page-title">Contact Us</h1>
</div>
</div>
<div class="col-lg-6 col-md-6 col-12">
<ul class="breadcrumb-nav">
<li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
<li>Contact</li>
</ul>
</div>
</div>
</div>
</div>


<section id="contact-us" class="contact-us section">
<div class="container">
<div class="contact-head">
<div class="row">
<div class="col-12">
<div class="section-title">
<h2>Contact Us</h2>
<p>There are many variations of passages of Lorem
Ipsum available, but the majority have suffered alteration in some form.</p>
</div>
</div>
</div>
<div class="contact-info">
<div class="row">
<div class="col-lg-4 col-md-12 col-12">
<div class="single-info-head">

<div class="single-info">
<i class="lni lni-map"></i>
<h3>Address</h3>
<ul>
<li>44 Shirley Ave. West Chicago,<br> IL 60185, USA.</li>
</ul>
</div>


<div class="single-info">
<i class="lni lni-phone"></i>
<h3>Call us on</h3>
<ul>
<li><a href="tel:+18005554400">+1 800 555 44 00 (Toll free)</a></li>
<li><a href="tel:+321556667890">+321 55 666 7890</a></li>
</ul>
</div>


<div class="single-info">
<i class="lni lni-envelope"></i>
<h3>Mail at</h3>
<ul>
<li><a href="/cdn-cgi/l/email-protection#e5969095958a9791a5968d8a9582978c8196cb868a88"><span class="__cf_email__" data-cfemail="067573767669747246756e697661746f62752865696b">[email&#160;protected]</span></a>
</li>
<li><a href="/cdn-cgi/l/email-protection#96f5f7e4f3f3e4d6e5fef9e6f1e4fff2e5b8f5f9fb"><span class="__cf_email__" data-cfemail="90f3f1e2f5f5e2d0e3f8ffe0f7e2f9f4e3bef3fffd">[email&#160;protected]</span></a></li>
</ul>
</div>

</div>
</div>
<div class="col-lg-8 col-md-12 col-12">
<div class="contact-form-head">
<div class="form-main">
<form class="form" method="post" action="assets/mail/mail.php">
<div class="row">
<div class="col-lg-6 col-md-6 col-12">
<div class="form-group">
<input name="name" type="text" placeholder="Your Name" required="required">
</div>
</div>
<div class="col-lg-6 col-md-6 col-12">
<div class="form-group">
<input name="subject" type="text" placeholder="Your Subject" required="required">
</div>
</div>
<div class="col-lg-6 col-md-6 col-12">
<div class="form-group">
<input name="email" type="email" placeholder="Your Email" required="required">
</div>
</div>
<div class="col-lg-6 col-md-6 col-12">
<div class="form-group">
<input name="phone" type="text" placeholder="Your Phone" required="required">
</div>
</div>
<div class="col-12">
<div class="form-group message">
<textarea name="message" placeholder="Your Message"></textarea>
</div>
</div>
<div class="col-12">
<div class="form-group button">
<button type="submit" class="btn ">Submit Message</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
@endsection