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
              <li class="breadcrumb-item active">Job Grades</li>
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
                            <h3 class="card-title"> View Job Grade</h3>
                        </div>

                        <form class="form-horizontal" action="" enctype="multipart/form-data" method="get">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Grade Level<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{ $jobGrades->grade_level }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">High Salary <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{ $jobGrades->highest_sal }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Low Salary <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{ $jobGrades->lowest_sal }}
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <a href="{{ url('admin/job_grades') }}" class="btn btn-default">Back</a>
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
