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
            </div>  
          </div>
        </div>
      </section>
      <!-- End banner Area -->  

      @foreach($passenger as $p)
      <section class="destinations-area section-gap" style="color: #000">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="single-destinations">
                <div class="details"  style="border-radius: 30px; background-color: #f2f2f2">
                  <div class="row">
                      <div class="vl"></div>
                    <div class="col-lg-9">
                      <div class="heading">ECONOMY CLASS | BOARDING PASS</div>
                      <ul style="margin-top: 20px">
                        <li>
                          <span>Name</span>
                        </li>
                        <li>
                          <span><h4>{{$p->nama}}</h4></span>
                        </li>
                      </ul>

                      <table class="table-boarding">
                        <tr>
                          <td>Flight</td>
                          <td>Gate</td>
                          <td>Boarding Time</td>
                          <td>Seat</td>
                        </tr>
                        <tr>
                          <td><h4>{{$plane->kode}}</h4></td>
                          <td><h4>F1</h4></td>
                          <td><h4>{{$rute->berangkat}}</h4></td>
                          <td><h4>{{$p->no_kursi}}</h4></td>
                        </tr>
                        <tr>
                          <td>From</td>
                          <td></td>
                          <td>To</td>
                        </tr> 
                        <tr>
                          <td><h4>{{$rute->asal}}</h4></td>
                          <td></td>
                          <td><h4>{{$rute->tujuan}}</h4></td>
                        </tr>                     
                      </table>
                      <ul style="margin-top: 20px">
                        <li>
                          <span>SPECIAL REQUEST</span>
                        </li>
                        <li>
                          <span>GATE CLOSES 15 MINS BEFORE STD</span>
                        </li>
                      </ul>
                      <ul style="margin-top: 20px">
                        <li>
                          <span>PLEASE BE AT THE BOARDING GATE AT LEAST 30 MINUTES BEFORE BOARDING TIME</span>
                        </li>
                      </ul>
                      <ul style="margin-top: 20px">
                        <li>
                          <span>ETKT {{$reservation->reservation_code}}</span>
                        </li>
                      </ul>
                    </div>
                    <div class="col-lg-3">
                      <div class="heading">Garuda Indonesia</div>
                      <ul style="margin-top: 20px">
                        <li>
                          <span>Name</span>
                        </li>
                        <li>
                          <span><h4>{{$p->nama}}</h4></span>
                        </li>
                      </ul>
                      <table class="table-boarding" style="margin-top: 70px">
                        <tr>
                          <td>Flight</td>
                          <td>Boarding Time</td>
                        </tr>
                        <tr>
                          <td><h4>{{$plane->kode}}</h4></td>
                          <td><h4>{{$rute->berangkat}}</h4></td>
                        </tr>
                      </table>
                      <table class="table-boarding">
                        <tr>
                          <td>Gate</td>
                          <td>From</td>
                          <td>To</td>
                        </tr>
                        <tr>
                          <td><h4>F1</h4></td>
                          <td><h4>{{$rute->nama($rute->asal)}}</h4></td>
                          <td><h4>{{$rute->nama($rute->tujuan)}}</h4></td>
                        </tr>
                        <tr>
                          <td>Seat</td>
                        </tr>
                        <tr>
                          <td><h4>{{$p->no_kursi}}</h4></td>
                        </tr>
                      </table>
                      <ul style="margin-top: 20px">
                        <li>
                          <span>ETKT {{$reservation->reservation_code}}</span>
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
      @endforeach
@stop
