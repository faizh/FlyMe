@extends('admin.include.master')

@section('content')
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Rute Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <h5><a href="/admin/rute/create" class="btn btn-primary">+ Create Rute</a></h5>
                <thead>
                <tr>
                  <th>Departure</th>
                  <th>Arrival</th>
                  <th>Departure At</th>
                  <th>Arrival At</th>
                  <th>Airplane</th>
                  <th>Date</th>
                  <th>Seat Quantity</th>
                  <th>Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rute as $r)
                <tr>
                  <td>{{$r->asal}}</td>
                  <td>{{$r->tujuan}}</td>
                  <td>{{$r->berangkat}}</td>
                  <td>{{$r->tiba}}</td>
                  <td>{{$r->maskapai}}</td>
                  <td>{{$r->tanggal}}</td>
                  <td>{{$r->sisa_seat}}</td>
                  <td style="text-align: right;">{{$r->harga}}</td>
                  <td><a href="/admin/rute/edit/{{$r->id}}">Edit</a> | <a href="/admin/rute/delete/{{$r->id}}">Delete</a></td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@stop