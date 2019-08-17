@extends('layoutweb.master')

@section('content')
			<!-- start banner Area -->
			<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Completed
							</h1>	
							<p class="text-white link-nav"><a href="index.html">{{$data->asal}} </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html"> {{$data->tujuan}}</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<section class="destinations-area section-gap">
				<div class="container">
					<div class="row">
						
						<div class="col-lg-12">
							<div class="single-destinations">
								<div class="details">
									<h5>Your booking have been completed. Waiting for verification..</h5>
									
								</div>
							</div>
						</div>	
					</div>



				</div>	
			</section>
@stop