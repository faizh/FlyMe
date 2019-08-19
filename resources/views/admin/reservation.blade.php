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
              <h3 class="box-title">Reservation Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Reservation Code</th>
                  <th>Price</th>
                  <th>Proof of Payment</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                $i=0;
                @endphp
                @foreach($reservation as $r)
                @php
                $i++;
                @endphp
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$r->reservation_code}}</td>
                  <td>{{$r->harga}}</td>
                  <td>{{$r->bukti_transfer}}</td>
                  <td>
                    @if($r->status=="0")
                    <a href="/admin/reservation/approve/{{$r->id}}" class="btn btn-warning">Approve</a>
                    @elseif($r->status=="1")
                    <a href="/admin/reservation/unapprove/{{$r->id}}" class="btn btn-success">Unapprove</a>
                    @endif
                  </td>
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