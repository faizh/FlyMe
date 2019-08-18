@extends('layoutweb.master')

@section('content')
			<!-- start banner Area -->
			<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Your Booking List
							</h1>	
							
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
									<table class="table table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th>Reservation Code</th>
												<th>Reservation Date</th>
												<th>Route</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										@php
										$i=0;
										@endphp
										@foreach($data as $d)
										@php
										$i++;
										@endphp
										<tr>
											<td>{{$i}}</td>
											<td>{{$d->reservation_code}}</td>
											<td>{{$d->created_at}}</td>
											<td>{{$d->rute($d->rute_id)}}</td>
											@if($d->status=="0")
												<td><span class="genric-btn danger radius">UNPAID</span></td>
											@elseif($d->status=="1")
												<td><span class="genric-btn success radius">PAID</span></td>
											@endif
											<form action="/bookinginfo" method="POST">
												{{csrf_field()}}
												<input type="hidden" name="reservation_id" value="{{$d->id}}">
												<td><button type="submit" class="genric-btn info radius">Check</button></td>
											</form>
										</tr>
										@endforeach
										<tbody>	
									</table>
								</div>
							</div>
						</div>	
						
					</div>
				</div>	
			</section>
@stop