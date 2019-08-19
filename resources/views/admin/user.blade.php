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
              <h3 class="box-title">User Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
              	<h5><a href="/admin/user/create" class="btn btn-primary">+ Create User</a></h5>
                <thead>
                <tr>
	            	<th>#</th>
	                <th>Name</th>
	                <th>Email</th>
	                <th>Created At</th>
	                <th>Level</th>
	                <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                $i=0;
                @endphp
                @foreach($user as $u)
                @php
                $i++;
                @endphp
                <tr>
                	<td>{{$i}}</td>
                  <td>{{$u->name}}</td>
                  <td>{{$u->email}}</td>
                  <td>{{$u->created_at}}</td>
                  <td>
                  	@if($u->level=="0")
                  	User
                  	@elseif($u->level=="1")
                  	Admin
                  	@endif
                  </td>
                  <td><a href="/admin/user/edit/{{$u->id}}">Edit</a> | <a href="/admin/user/delete/{{$u->id}}">Delete</a></td>
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