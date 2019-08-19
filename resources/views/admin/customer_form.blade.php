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
            <div class="box-body">
              <form role="form" action="/admin/customer/update" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" placeholder="Enter ..." name="nama" value="{{$customer->nama}}">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" placeholder="Enter ..." name="email" value="{{$customer->email}}">
                </div>
                <div class="form-group">
                  <label>Phone</label>
                  <input type="number" class="form-control" placeholder="Enter ..." name="telepon" value="{{$customer->telepon}}">
                </div>
                 <div class="form-group">
                 	<input type="hidden" name="customer_id" value="{{$customer->id}}">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
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