<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('setup/img/apple-icon.png')}}" />
	<link rel="icon" type="image/png" href="{{asset('setup/img/favicon.png')}}" />
	<title>Setup | E-Shop</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!-- CSS Files -->
    <link href="{{asset('setup/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('setup/css/paper-bootstrap-wizard.css')}}" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="{{asset('setup/css/demo.css')}}" rel="stylesheet" />

	<!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="{{asset('setup/css/themify-icons.css')}}" rel="stylesheet">
	
	</head>

	<body>
	<div class="image-container set-full-height" style="background-image: url('setup/img/paper-1.jpeg')">
	    <!--   Creative Tim Branding   -->
	    <a href="https://github.com/ahmed5bdelaal">
	         <div class="logo-container">
	            <div class="logo">
	                <img src="{{asset('setup/img/new_logo.png')}}">
	            </div>
	            <div class="brand">
	                Ahmed Abdelaal
	            </div>
	        </div>
	    </a>

		<!--  Made With Paper Kit  -->
		<a href="https://github.com/ahmed5bdelaal" class="made-with-pk">
			<div class="brand">Aa</div>
			<div class="made-with"><strong>Ahmed Abdelaal</strong></div>
		</a>

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">

		            <!--      Wizard container        -->
		            <div class="wizard-container">

		                <div class="card wizard-card" data-color="orange" id="wizardProfile">
		                    <form action="{{url('settings-first')}}" method="post" enctype="multipart/form-data">
		                <!--        You can switch " data-color="orange" "  with one of the next bright colors: "blue", "green", "orange", "red", "azure"          -->
								@csrf
		                    	<div class="wizard-header text-center">
		                        	<h3 class="wizard-title">Create your profile</h3>
									<p class="category">This information will let us know more about you.</p>
		                    	</div>

								<div class="wizard-navigation">
									<div class="progress-with-circle">
									     <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
									</div>
									<ul>
			                            <li>
											<a href="#about" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-user"></i>
												</div>
												About
											</a>
										</li>
			                            <li>
											<a href="#account" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-settings"></i>
												</div>
												Settings
											</a>
										</li>
			                            <li>
											<a href="#address" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-map"></i>
												</div>
												Address
											</a>
										</li>
			                        </ul>
								</div>
		                        <div class="tab-content">
		                            <div class="tab-pane" id="about">
		                            	<div class="row">
											<h5 class="info-text"> Please tell us more about yourself.</h5>
											<div class="col-sm-4 col-sm-offset-1">
												<div class="picture-container">
													<div class="picture">
														<img src="{{asset('setup/img/default-avatar.jpg')}}" class="picture-src" id="wizardPicturePreview" title="" />
														<input type="file" name="photo" id="wizard-picture">
													</div>
													<h6>Choose Picture</h6>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label>First Name <small>(required)</small></label>
													<input name="firstname" type="text" class="form-control" placeholder="Ahmed">
												</div>
												<div class="form-group">
													<label>Last Name <small>(required)</small></label>
													<input name="lastname" type="text" class="form-control" placeholder="Abdelaal">
												</div>
												<div class="form-group">
													<label>Password <small>(required)</small></label>
													<input name="password" type="password" class="form-control" placeholder="********">
												</div>
											</div>
											<div class="col-sm-10 col-sm-offset-1">
												<div class="form-group">
													<label>Email <small>(required)</small></label>
													<input name="emailUser" type="email" class="form-control" placeholder="ahmed@gmail.com">
												</div>
											</div>
										</div>
		                            </div>
									<div class="tab-pane" id="account">
		                            	<div class="row">
											<h5 class="info-text"> Please tell us more about your site.</h5>
											<div class="col-sm-4 col-sm-offset-1">
												<div class="picture-container">
													<div class="picture">
														<img src="{{asset('setup/img/default-avatar.jpg')}}" class="picture-src" id="wizardPicturePreview" title="" />
														<input type="file" name="logo" id="wizard-picture">
													</div>
													<h6>Choose Picture</h6>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label>Name <small>(required)</small></label>
													<input name="name" type="text" class="form-control" placeholder="eshop">
												</div>
												<div class="form-group">
													<label>Phone Number <small>(required)</small></label>
													<input name="phone" type="number" class="form-control" placeholder="01234567891">
												</div>
												<div class="form-group">
													<label>Email <small>(required)</small></label>
													<input name="email" type="email" class="form-control" placeholder="aa@eshop.com">
												</div>
												<div class="form-group">
													<label>Short Description <small>(required)</small></label>
													<input name="short_des" type="text" class="form-control" placeholder="e-shop is eccomerce">
												</div>
											</div>
											<div class="col-sm-10 col-sm-offset-1">
												<div class="form-group">
													<label>Description <small>(required)</small></label>
													<input name="description" type="text" class="form-control" placeholder="e-shop is eccomerce.......">
												</div>
											</div>
										</div>
		                            </div>
									
		                            <div class="tab-pane" id="address">
		                                <div class="row">
		                                    <div class="col-sm-12">
		                                        <h5 class="info-text"> Address And Social Media </h5>
		                                    </div>
		                                    <div class="col-sm-7 col-sm-offset-1">
		                                    	<div class="form-group">
		                                            <label>Address</label>
													<div class="input-group">
														<span style="background-color: #F3BB45" class="input-group-addon">Address</span>
		                                            	<input type="text" name="address" class="form-control">
													</div>
		                                        </div>
		                                    </div>
		                                    
		                                    <div class="col-sm-7 col-sm-offset-1">
												<div class="form-group">
		                                            <label>Username For Facebock</label>
													<div class="input-group">
														<span style="background-color: #F3BB45" class="input-group-addon">https://www.facebock.com/</span>
		                                            	<input type="text" name="facebock" class="form-control">
													</div>
		                                        </div>
		                                    </div>
		                                </div>
										<div class="row">
		                                    <div class="col-sm-7 col-sm-offset-1">
												<div class="form-group">
		                                            <label>Username For Twitter</label>
													<div class="input-group">
														<span style="background-color: #F3BB45" class="input-group-addon">https://www.twitter.com/</span>
		                                            	<input type="text" name="twitter" class="form-control">
													</div>
		                                        </div>
		                                    </div>
		                                </div>
										<div class="row">
		                                    <div class="col-sm-7 col-sm-offset-1">
												<div class="form-group">
		                                            <label>Username For Instagram</label>
													<div class="input-group">
														<span style="background-color: #F3BB45" class="input-group-addon">https://www.instagram.com/</span>
		                                            	<input type="text" name="instagram" class="form-control">
													</div>
		                                        </div>
		                                    </div>
		                                </div>
										<div class="row">
		                                    <div class="col-sm-7 col-sm-offset-1">
												<div class="form-group">
		                                            <label>Username For Google</label>
													<div class="input-group">
														<span style="background-color: #F3BB45" class="input-group-addon">https://www.google.com/</span>
		                                            	<input type="text" name="google" class="form-control">
													</div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="wizard-footer">
		                            <div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd' name='next' value='Next' />
		                                <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd' name='finish' value='Finish' />
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div><!-- end row -->
		</div> <!--  big container -->

	    <div class="footer">
	        <div class="container text-center">
	            Made with <i class="fa fa-heart heart"></i> by <a href="https://github.com/ahmed5bdelaal">Ahmed Abdelaal</a>
	        </div>
	    </div>
	</div>

</body>

	<!--   Core JS Files   -->
	<script src="{{asset('setup/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('setup/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('setup/js/jquery.bootstrap.wizard.js')}}" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="{{asset('setup/js/demo.js" type="text/javascript')}}"></script>
	<script src="{{asset('setup/js/paper-bootstrap-wizard.js')}}" type="text/javascript"></script>

	<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
	<script src="{{asset('setup/js/jquery.validate.min.js')}}" type="text/javascript"></script>

</html>
