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
								<form class="form-wrap" action="/postlogin" method="POST" >
									{{csrf_field()}}
									<h3 style="margin-bottom: 20px">Login Here</h3>
									<input type="email" min="1" max="20" class="form-control" name="email" placeholder="Email " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email '">
									<input type="password" min="1" max="20" class="form-control" name="password" placeholder="Password " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password '">
									<button type="submit" class="primary-btnlogin text-uppercase" style="margin-top: 10px">Login</button>
																
								</form>
							  </div>
							</div>
						</div>
					</div>
				</div>					
			</section>
			<!-- End banner Area -->

@stop