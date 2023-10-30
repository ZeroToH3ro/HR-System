@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Account</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item active">Account</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="content-fluid">
            @include('_message')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit Account</h3>
                        </div>

                        <form class="form-horizontal" accept="{{ url('employee/my_account') }}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable"> Name <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="{{ $getRecord->name }}" class="form-control" required placeholder="Enter Name">
                                        <span style="color: red;">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable"> Email <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" value="{{ $getRecord->email }}" class="form-control" required placeholder="Enter Email">
                                        <span style="color: red;">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable"> Profile Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="profile_image" class="form-control" >
                                        @if (!empty($getRecord->profile_image))
                                            @if (file_exists(public_path('images/profile/'.$getRecord->profile_image)))
                                                <img src="{{ asset('images/profile/'.$getRecord->profile_image) }}" style="width: 80px; height:80px" alt="avatar">
                                            @endif
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable"> Password <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="password" class="form-control">
                                        (Leave blank, if you are not changing password)
                                        <span style="color: red;">{{ $errors->first('password') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
<!-- /.content-wrapper -->
@endsection
