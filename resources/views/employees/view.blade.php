@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Employees</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">View</a></li>
              <li class="breadcrumb-item active">Employees</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="content-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"> View Employee</h3>
                        </div>

                        <form class="form-horizontal" enctype="multipart/form-data" method="post">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">ID</label>
                                    <div class="col-sm-10">
                                        {{ $getRecord->id }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">First Name</label>
                                    <div class="col-sm-10">
                                        {{ $getRecord->name }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Last Name</label>
                                    <div class="col-sm-10">
                                        {{ $getRecord->last_name }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Role</label>
                                    <div class="col-sm-10">
                                        {{ !empty($value->is_role) ? 'HR' : 'Employee' }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Email</label>
                                    <div class="col-sm-10">
                                        {{ $getRecord->email }}
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Phone Number</label>
                                    <div class="col-sm-10">
                                        {{ $getRecord->phone_number }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Date</label>
                                    <div class="col-sm-10">
                                        {{ date('d-m-Y', strtotime($getRecord->hire_date)) }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Job Name</label>
                                    <div class="col-sm-10">
                                        {{ !empty($getRecord->get_job_single->job_title) ? $getRecord->get_job_single->job_title : ''}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Salary</label>
                                    <div class="col-sm-10">
                                        {{ $getRecord->salary }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Commission PCT</label>
                                    <div class="col-sm-10">
                                        {{ $getRecord->commission_pct }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Image Profile</label>
                                    <div class="col-sm-10">
                                        @if (!empty($getRecord->profile_image))
                                            @if (file_exists(public_path('images/profile/'.$getRecord->profile_image)))
                                                <img src="{{ asset('images/profile/'.$getRecord->profile_image) }}" style="width: 80px; height:80px" alt="avatar">
                                            @endif
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Position</label>
                                    <div class="col-sm-10">
                                        {{ !empty($getRecord->get_position_single->position_name) ? $getRecord->get_position_single->position_name : ' ' }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Manager Name</label>
                                    <div class="col-sm-10">
                                        {{ !empty($getRecord->get_manager_single->manger_name) ? $getRecord->get_manager_single->manger_name : '' }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Department Name</label>
                                    <div class="col-sm-10">
                                        {{ !empty($getRecord->get_department_single->department_name) ? $getRecord->get_department_single->department_name : '' }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Created Date</label>
                                    <div class="col-sm-10">
                                        {{ date('d-m-Y H:i A', strtotime($getRecord->created_at)) }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Updated Date</label>
                                    <div class="col-sm-10">
                                        {{ date('d-m-Y H:i A', strtotime($getRecord->updated_at)) }}
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{ url('admin/employees') }}" class="btn btn-default">Back</a>
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
