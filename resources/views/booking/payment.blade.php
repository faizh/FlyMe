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
							<div class="col-lg-12" style="padding-right: 0px">
								<div class="single-destinations">
									<div class="details">
										<h4>Booking</h4>
										<ul class="package-list">
											<li class="d-flex justify-content-between align-items-center">
												<span>Your Reservation Code</span>
											</li>
										</ul>
									</div>
								</div>
							</div>

							
							
							@php
							$i=0;
							@endphp

							@foreach($reservation as $r)
							
							@php
							$i++
							@endphp
							<div class="col-lg-12" style="padding-right: 0px">
								<div class="single-destinations">
									<div class="details">
										<h4>Passenger {{$i}}</h4>
										<ul class="package-list">
											<li class="d-flex justify-content-between align-items-center">
												<span>Name</span>
												<span>{{$r->title}} {{$r->nama}}</span>
											</li>
											<li class="d-flex justify-content-between align-items-center">
												<span>ID Card Number</span>
												<span>{{$r->no_identitas}}</span>
											</li>
											<li class="d-flex justify-content-between align-items-center">
												<span>Seat Number</span>
												<span>{{$r->no_kursi}}</span>
											</li>
										</ul>
									</div>
								</div>
							</div>	
							@endforeach
						</div>

						

						

						<div class="col-lg-4">
							<div class="col-lg-12" style="padding-left: 0px">
								<div class="single-destinations">
									<div class="details">
										<h4>Flight Details</h4>
										<ul class="package-list">
											<li class="d-flex justify-content-between align-items-center">
												<span>Airplane</span>
												<span>{{$data->maskapai}}</span>
											</li>
											<li class="d-flex justify-content-between align-items-center">
												<span>From</span>
												<span>{{$data->asal}}</span>
											</li>
											<li class="d-flex justify-content-between align-items-center">
												<span>To</span>
												<span>{{$data->tujuan}}</span>
											</li>
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

							<div class="col-lg-12" style="padding-left: 0px">
									<div class="single-destinations">
										<div class="details">
											<h4>Payment</h4>
											<ul class="package-list">
												<li class="d-flex justify-content-between align-items-center">
													<span>Price per person</span>
													<span>IDR {{$data->harga}}</span>
												</li>
												<li class="d-flex justify-content-between align-items-center">
													<span>Passenger</span>
													<span>{{$reservation->count()}}</span>
												</li>
												<li class="d-flex justify-content-between align-items-center">
													<span>Total Price</span>
													@php
													$total_price = $reservation->count() * $data->harga;
													@endphp
													<span class="price-btn">IDR {{$total_price}}</span>
												</li>
												<li class="d-flex justify-content-between align-items-center">
													<span><h6>Your Booking Successfull, to finish your payment, please transfer your money to</h6></span>
												</li>
												<li class="d-flex justify-content-between align-items-center">
													<span>Mandiri</span>
													<span>1231231231231</span>
												</li>
												<li class="d-flex justify-content-between align-items-center">
													<span>BCA</span>
													<span>1231231231231</span>
												</li>
												<li class="d-flex justify-content-between align-items-center">
													<span>BRI</span>
													<span>1231231231231</span>
												</li>													
												<li class="d-flex justify-content-between align-items-center">
													<span><h6>Upload your proof of payment</h6></span>
												</li>
												<li class="d-flex justify-content-between align-items-center">
													<span>
														<form action="/payment" method="POST" enctype="multipart/form-data">
															{{csrf_field()}}
															<input type="file" name="proof">
															<input type="hidden" name="customer_id" value="{{$customer_id}}">
													</span>
												</li>
												<li class="d-flex justify-content-between align-items-center">
													<span></span>
														<button type="submit" class="genric-btn primary" style="float: right;">Upload</button>	
													</form>
												</li>
											</ul>
										</div>
									</div>
								</div>	
							</div>	

						</div>

						
						
					</div>



				</div>	
			</section>
@stop