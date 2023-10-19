
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
              <li class="breadcrumb-item"><a href="#">View</a></li>
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
                            <h3 class="card-title"> View Job History</h3>
                        </div>

                        <form class="form-horizontal" accept="{{ url('admin/job_history/edit/'.$getRecords->id) }}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Employee Name<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{ !empty($getRecords->get_user_single->name) ? $getRecords->get_user_single->name . ' ' . $getRecords->get_user_single->last_name : ''}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Start Date <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{ $getRecords->start_date }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">End Date <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{ $getRecords->end_date }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Job Name<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{ !empty($getRecords->get_job_single->job_title) ? $getRecords->get_job_single->job_title : ' '}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Department Name<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{ !empty($getRecords->get_department_single->department_name) ? $getRecords->get_department_single->department_name : ' '}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ url('admin/job_history') }}" class="btn btn-default">Back</a>
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
