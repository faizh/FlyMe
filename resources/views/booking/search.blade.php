@extends('layoutweb.master')

@section('content')
			<!-- start banner Area -->
			<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Choose Your Airplane
							</h1>	
							<p class="text-white link-nav"><a href="index.html">{{$asal}} </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html"> {{$tujuan}}</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<section class="destinations-area section-gap">
				<div class="container">
					<div class="row">
						@foreach($data as $d)
						<div class="col-lg-4">
							<div class="single-destinations">
								<div class="details">
									<h4>{{$d->maskapai}}</h4>
									<ul class="package-list">
										<li class="d-flex justify-content-between align-items-center">
											<span>Date</span>
											<span>{{$d->tanggal}}</span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Departure</span>
											<span>{{$d->berangkat}}</span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Arrival</span>
											<span>{{$d->tiba}}</span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Price per person</span>
											<span class="price-btn">IDR {{$d->harga}}</span>
										</li>													
										<li class="d-flex justify-content-between align-items-center">
											<span></span>
											<form action="/booking/choose" method="POST">
												{{csrf_field()}}
												<input type="hidden" name="rute_id" value="{{$d->id}}">
												<input type="hidden" name="passenger_quantity" value="{{$passenger_quantity}}">
												<button type="submit" class="genric-btn primary" style="float: right;" >Next</button>	
											</form>
										</li>
									</ul>
								</div>
							</div>
						</div>	
						@endforeach	
					</div>
				</div>	
			</section>
@stop