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
              <h3 class="box-title">Plane Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
              	<h5><a href="/admin/plane/create" class="btn btn-primary">+ Create Plane</a></h5>
                <thead>
                <tr>
	            	<th>#</th>
	                <th>Name</th>
	                <th>Code</th>
	                <th>Seat</th>
	                <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                $i=0;
                @endphp
                @foreach($plane as $p)
                @php
                $i++;
                @endphp
                <tr>
                	<td>{{$i}}</td>
                  <td>{{$p->nama}}</td>
                  <td>{{$p->kode}}</td>
                  <td>{{$p->seat}}</td>
                  <td><a href="/admin/plane/edit/{{$p->id}}">Edit</a> | <a href="/admin/plane/delete/{{$p->id}}">Delete</a></td>
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