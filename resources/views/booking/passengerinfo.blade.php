@extends('layoutweb.master')

@section('content')
			<!-- start banner Area -->
			<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Passenger Information
							</h1>	
							<p class="text-white link-nav">{{$data->asal}} <span class="lnr lnr-arrow-right"></span>{{$data->tujuan}}</p>
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
										<h4 style="margin-bottom: 20px">Contact Person Details</h4>
										<form class="form-area contact-form text-right" action="/contactinfo/{{$data->id}}/{{$passenger}}" method="post"> 
											{{csrf_field()}}
										<div class="row">	
											<div class="col-lg-12 form-group">
												<input name="nama" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">
											</div>
											<div class="col-lg-12 form-group">
												<input name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your email'" class="common-input mb-20 form-control" required="" type="email">
											</div>
											<div class="col-lg-12 form-group">
												<input name="phone" placeholder="Phone number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your phone number'" class="common-input mb-20 form-control" required="" type="number">
											</div>
											<div class="col-lg-12">
												<div class="alert-msg" style="text-align: left;"></div>
											</div>
										</div>
									
									</div>
								</div>
								
								@for($i=1;$i<=$passenger;$i++)
								<div class="single-destinations">
									<div class="details">
										<h4 style="margin-bottom: 20px">Passenger Details</h4>
											
										<div class="row">	
											<div class="col-lg-12 form-group">
												<select class="common-input mb-20 form-control" name="title{{$i}}">
													<option>- Title -</option>
													<option value="Mr.">Mr.</option>
													<option value="Mrs.">Mrs.</option>
													<option value="Ms.">Ms.</option>
													
												</select>			
											</div>
											<div class="col-lg-12 form-group">
												<input name="name{{$i}}" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">
											</div>
											<div class="col-lg-12 form-group">
												<input name="idcard{{$i}}" placeholder="ID Card Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="number">
											</div>
										</div>
									
									</div>
								</div>
								@endfor

								<div class="row" style="margin-top: 30px;">	
									<div class="col-lg-12" @if($i==$passenger) style="display: none;" @endif>
										<div class="alert-msg" style="text-align: left;"></div>
										<button type="submit" class="genric-btn primary" style="float: right;" >Next</button>	
									</div>
									</form>
								</div>
						</div>	
						
						<div class="col-lg-4">
								<div class="single-destinations">
									<div class="details">
										<h4>Details</h4>
										<h5>{{$data->asal}} <span class="lnr lnr-arrow-right"></span> {{$data->tujuan}}</h5>
										<ul class="package-list">
											<li class="d-flex justify-content-between align-items-center">
												<span>Airplane</span>
												<span>{{$data->maskapai}}</span>
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
											<li class="d-flex justify-content-between align-items-center">
												@php
												$harga = (int)$data->harga;
												$total = $harga*$passenger;
												@endphp
												<span>Total Price</span>
												<span class="price-btn">IDR {{$total}}</span>
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