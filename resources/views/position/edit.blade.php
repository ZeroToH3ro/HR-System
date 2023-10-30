@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Position</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item active">Position</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="content-fluid">
            @include('_message')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit Position</h3>
                        </div>

                        <form class="form-horizontal" accept="{{ url('admin/position/edit'.$position->id) }}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Position Name:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="position_name" value="{{ $position->position_name }}" class="form-control" required placeholder="Enter Position Name:">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Daily Rate:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="daily_rate" value="{{ $position->daily_rate }}" class="form-control" required placeholder="Enter Daily Rate:">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Monthly Rate:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="monthly_rate" value="{{ $position->monthly_rate }}" class="form-control" required placeholder="Enter Monthly Rate:">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Working Days Per Month:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="working_days_per_month" value="{{ $position->working_days_per_month }}" class="form-control" required placeholder="Enter Working Days Per Month:">
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <a href="{{ url('admin/position') }}" class="btn btn-default">Back</a>
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
