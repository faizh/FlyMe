@extends('layoutweb.master')

@section('content')
			<!-- start banner Area -->
			<section class="banner-area relative">
				<div class="overlay overlay-bg"></div>				
				<div class="container">
					<div class="row fullscreen align-items-center justify-content-between">
						<div class="col-lg-6 col-md-6 banner-left">
							<h6 class="text-white">Away from monotonous life</h6>
							<h1 class="text-white">MAGICAL TRAVEL</h1>
							<p class="text-white">
								If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see some for as low as $.17 each.
							</p>
							<a href="#" class="primary-btn text-uppercase">Get Started</a>
						</div>
						<div class="col-lg-5 col-md-6 banner-right">
							<div class="tab-content" id="myTabContent">
							  <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
								<form class="form-wrap" action="/postsignup" method="POST" name="signup">
									{{csrf_field()}}
									<h3 style="margin-bottom: 20px">Sign Up Here</h3>
									<input type="text" name="name" placeholder="Name" class="form-control {{$errors->has('nama') ? 'has-error' : ''}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name '" required="">
									@if($errors->has('nama'))
								    	<span class="help-block">{{$errors->first('nama')}}</span>
								    @endif
									@if($errors->has('email'))
								    	<span class="help-block" style="color: red">{{$errors->first('email')}}</span>
								    @endif
									<input type="email" min="1" max="20" class="form-control {{$errors->has('email') ? 'has-error' : ''}}" name="email" placeholder="Email " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email '" required="">
									<input type="password" min="1" max="20" class="form-control" name="password" placeholder="Password " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password '" required="">
									<input type="password" min="1" max="20" class="form-control" name="retype_password" placeholder="Retype Password " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Retype Password '" required="">
									<button type="submit" class="primary-btnlogin text-uppercase" style="margin-top: 10px">Sign Up</button>
									<br></br>
								</form>
							  </div>
							</div>
						</div>
					</div>
				</div>					
			</section>
			<!-- End banner Area -->
<!-- 			<script>
				function checkNames() {
			    // Find the validation image div
			    var validationElement = document.getElementById('nameValidation');
			    // Get the form values
			    var password = document.forms["signup"]["password"].value;
			    var retype_password = document.forms["signup"]["retype_password"].value;
			    // Reset the validation element styles
			    validationElement.style.display = 'none';
			    validationElement.className = 'validation-image';
			    // Check if name2 isn't null or undefined or empty
			    if (retype_password) {
			        // Show the validation element
			        validationElement.style.display = 'inline-block';
			        // Choose which class to add to the element
			        validationElement.className += 
			            (password == retype_password ? ' validation-success' : ' validation-error');
			    }
			}
			</script> -->

@stop