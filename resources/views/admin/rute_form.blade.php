@extends('admin.include.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <!-- /.box -->
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">General Elements</h3>
            </div>
            <!-- /.box-header -->
            @if($action=="create")
            <div class="box-body">
              <form role="form" action="/admin/rute/postcreate" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                  <label>Departure</label>
                  <input type="text" class="form-control" placeholder="Enter ..." name="asal">
                </div>
                <div class="form-group">
                  <label>Arrival</label>
                  <input type="text" class="form-control" placeholder="Enter ..." name="tujuan">
                </div>
                <div class="form-group">
                  <label>Departure At</label>
                  <input type="time" class="form-control" placeholder="Enter ..." name="berangkat">
                </div>
                <div class="form-group">
                  <label>Arrival At</label>
                  <input type="time" class="form-control" placeholder="Enter ..." name="tiba">
                </div>
                <div class="form-group">
                  <label>Airplane</label>
                  <input type="text" class="form-control" placeholder="Enter ..." name="maskapai">
                </div>
                <div class="form-group">
                  <label>Date</label>
                  <input type="date" class="form-control" placeholder="Enter ..." name="tanggal">
                </div>
                <div class="form-group">
                  <label>Seat Quantity</label>
                  <input type="number" class="form-control" placeholder="Enter ..." name="seat">
                </div>
                <div class="form-group">
                  <label>Price</label>
                  <input type="number" class="form-control" placeholder="Enter ..." name="harga">
                </div>
                 <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            @endif

            @if($action=="edit")
            <div class="box-body">
              <form role="form" action="/admin/rute/update" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                  <label>Departure</label>
                  <input type="text" class="form-control" placeholder="Enter ..." name="asal" value="{{$rute->asal}}">
                </div>
                <div class="form-group">
                  <label>Arrival</label>
                  <input type="text" class="form-control" placeholder="Enter ..." name="tujuan" value="{{$rute->tujuan}}">
                </div>
                <div class="form-group">
                  <label>Departure At</label>
                  <input type="time" class="form-control" placeholder="Enter ..." name="berangkat" value="{{$rute->berangkat}}">
                </div>
                <div class="form-group">
                  <label>Arrival At</label>
                  <input type="time" class="form-control" placeholder="Enter ..." name="tiba" value="{{$rute->tiba}}">
                </div>
                <div class="form-group">
                  <label>Airplane</label>
                  <input type="text" class="form-control" placeholder="Enter ..." name="maskapai" value="{{$rute->maskapai}}">
                </div>
                <div class="form-group">
                  <label>Date</label>
                  <input type="date" class="form-control" placeholder="Enter ..." name="tanggal" value="{{$rute->tanggal}}">
                </div>
                <div class="form-group">
                  <label>Seat Quantity</label>
                  <input type="number" class="form-control" placeholder="Enter ..." name="seat" value="{{$rute->sisa_seat}}">
                </div>
                <div class="form-group">
                  <label>Price</label>
                  <input type="number" class="form-control" placeholder="Enter ..." name="harga" value="{{$rute->harga}}">
                </div>
                 <div class="form-group">
                  <input type="hidden" name="rute_id" value="{{$rute->id}}">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            @endif
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  @stop