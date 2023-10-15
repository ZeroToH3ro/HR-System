@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Jobs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add</a></li>
              <li class="breadcrumb-item active">Job History</li>
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
                            <h3 class="card-title"> Add Job History</h3>
                        </div>

                        <form class="form-horizontal" accept="{{ url('admin/job_history/add') }}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Employee Name<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="employee_id">
                                            <option value="">Select Employee</option>
                                            @foreach ($getEmployees as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }} {{ $item->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Start Date <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="date" name="start_date" value="{{ old('start_date') }}" class="form-control" required placeholder="Enter Start Date">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">End Date <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="date" name="end_date" value="{{ old('end_date') }}" class="form-control" required placeholder="Enter End Date">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Job Name<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="job_id">
                                            <option value="">Select Job</option>
                                            @foreach ($getJobs as $item)
                                                <option value="{{ $item->id }}">{{ $item->job_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Department Name<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="department_id">
                                            <option value="">Select Department Name</option>
                                            <option value="1">Developer Department</option>
                                            <option value="2">BDM Department</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer">
                                <a href="{{ url('admin/job_history') }}" class="btn btn-default">Back</a>
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
