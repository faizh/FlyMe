@extends('layoutweb.master')

@section('content')
			<!-- start banner Area -->
			<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Choose Your Seat
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
										<form action="/booking/payment" method="POST">
											{{csrf_field()}}
										<table class="customer-table">

											<?php $i = 0; ?>
											@foreach($jumlah_seat as $p)
											<?php $i++; ?>
											<tr>
												<td>
													<div onclick="pget(this.id)" id="p<?php echo $i ?>" class="customer-color id-p<?php echo $i ?>"></div>
												</td>
												<td>
													<span>{{$p->nama}}</span>
												</td>
												<td>
													<input name="seat{{$i}}" class="form-control" id="i<?php echo $i ?>" type="text">
													<input type="hidden" name="passenger_quantity" value="{{$i}}">
													<input type="hidden" name="rute_id" value="{{$data->id}}">
													<input type="hidden" name="customer_id" value="{{$customer_id}}">
													<input type="hidden" name="passenger_id{{$i}}" value="{{$p->id}}">
												</td>
											</tr>

											@endforeach
											
										</table>

										<div class="seat">
											<?php for ($i = 1; $i <= $data->seat($data->id_plane); $i++) : ?>

											<?php if ($booked_seat !== 0) : ?>
												<?php if (in_array($i, $booked_seat)) : ?>
											<div id="<?php echo $i ?>" class="seat-id seat-notavailabe">
												<p><?php echo $i ?></p>
											</div>

												<?php else : ?>
											<div onclick="sget(this.id)" id="<?php echo $i ?>" class="seat-id">
												<p><?php echo $i ?></p>
											</div>
												<?php endif; ?>
											<?php else : ?>
											<div onclick="sget(this.id)" id="<?php echo $i ?>" class="seat-id">
												<p><?php echo $i ?></p>
											</div>
											<?php endif; ?>
											<?php endfor; ?>
										</div>
										<div class="row" style="margin-top: 30px;">	
										<div class="col-lg-12" @if($i==$passenger_quantity) style="display: none;" @endif>
											<div class="alert-msg" style="text-align: left;"></div>
											<button type="submit" class="genric-btn primary" style="float: right;" >Next</button>	
											</div>
											</form>
										</div>
									</div>
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
												$total = $harga*$passenger_quantity;
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

			<script>
			function pget(id) {
				seat.p = id;
				$('.customer-color').removeClass("customer-selected");
				$('#' + id).addClass("customer-selected");
			}

			function sget(id) {
				seat.selectSeat(id);
			}

			var seat = {
				p: '',
				pn: function (id) {
					pn = id.replace('p', '');
					return pn;
				},
				selectSeat: function (id) {
					if ($('#' + id).attr('class') == 'seat-id') {

						if ($('#i' + this.pn(this.p)).val() == '') {
							$('#' + id).addClass("seat-selected");
							// console.log(this.pn(this.p));
							$('#i' + this.pn(this.p)).val(id);
							$('#' + id).addClass('seat-for-' + this.p);
						}


					} else {
						cSeat = $('#' + id).attr('class');
						cSeatoc = cSeat.replace('seat-id seat-selected seat-for-p', '');
						$('#' + id).removeClass("seat-selected");
						$('#' + id).removeClass(cSeat.replace('seat-id ', ''));
						$('#i' + cSeatoc).val('');


					}
					//    console.log($('#'+id).attr('class'));
				}
			}

		</script>

@stop