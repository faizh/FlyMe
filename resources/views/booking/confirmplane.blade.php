@extends('layoutweb.master')

@section('content')
			<!-- start banner Area -->
			<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Confirm Your Airplane
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
						
						<div class="col-lg-8">
							<div class="single-destinations">
								<div class="details">
									<h4>{{$data->maskapai}}</h4>
									<h5>{{$data->asal}} <span class="lnr lnr-arrow-right"></span> {{$data->tujuan}}</h5>
									<ul class="package-list">
										<li class="d-flex justify-content-between align-items-center">
											<span>Date</span>
											<span>{{$data->tanggal}}</span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Departure</span>
											<span>{{$data->berangkat}}</span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Arrival</span>
											<span>{{$data->tiba}}</span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											@php
											$tiba = strtotime($data->tiba);
											$berangkat = strtotime($data->berangkat);
											$tduration =  $tiba-$berangkat;
											$duration = date('H:i:s', $tduration)
											@endphp
											<span>Duration</span>
											<span>{{$duration}}</span>
										</li>
									</ul>
								</div>
							</div>
						</div>	
						<div class="col-lg-4">
								<div class="single-destinations">
									<div class="details">
										<h4>Total Price</h4>
										<ul class="package-list">
											<li class="d-flex justify-content-between align-items-center">
												<span>Price per person</span>
												<span>IDR {{$data->harga}}</span>
											</li>
											<li class="d-flex justify-content-between align-items-center">
												<span>Passenger</span>
												<span>{{$passenger}}</span>
											</li>
											<li class="d-flex justify-content-between align-items-center">
												<span>Total Price</span>
												<span>{{$passenger}} x {{$data->harga}}</span>
											</li>
											<li class="d-flex justify-content-between align-items-center">
												@php
												$harga = (int)$data->harga;
												$total = $harga*$passenger;
												@endphp
												<span></span>
												<span class="price-btn">IDR {{$total}}</span>
											</li>													
											<li class="d-flex justify-content-between align-items-center">
												<span></span>
												<a href="/passenger/{{$data->id}}/{{$passenger}}" class="primary-btn text-uppercase">Confirm</a>
											</li>
										</ul>
									</div>
								</div>
							</div>	
						</div>
					</div>



				</div>	
			</section>
@stop