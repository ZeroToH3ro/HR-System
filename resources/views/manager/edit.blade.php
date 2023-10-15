@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manager</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item active">Manager</li>
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
                            <h3 class="card-title">Edit Manager</h3>
                        </div>

                        <form class="form-horizontal" accept="{{ url('admin/manager/edit'.$getRecord->id) }}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable"> Manager Name <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="manger_name" value="{{ $getRecord->manger_name }}" class="form-control" required placeholder="Enter Manager Name">
                                    </div>
                                </div>
                                <span style="color: red;"> {{ $errors->first('manger_name') }} </span>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable"> Manager Email <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="email" name="manager_email" value="{{ $getRecord->manager_email }}" class="form-control" required placeholder="Enter Manager Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable"> Manager Mobile <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="manager_mobile" value="{{ $getRecord->manager_mobile }}" class="form-control" required placeholder="Enter Manager Mobile">
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <a href="{{ url('admin/manager') }}" class="btn btn-default">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
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
