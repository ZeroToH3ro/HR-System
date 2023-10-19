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
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item active">Employees</li>
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
                            <h3 class="card-title">Edit Employee</h3>
                        </div>

                        <form class="form-horizontal" action="{{ url('admin/employees/edit/'.$getRecord->id) }}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">First Name <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="{{ $getRecord->name }}" class="form-control" required placeholder="Enter First Name">
                                        <span style="color: red">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ $getRecord->last_name }}" name="last_name" class="form-control" placeholder="Enter Last Name">
                                        <span style="color: red">{{ $errors->first('last_name') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Email <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="email" value="{{ $getRecord->email }}" name="email" class="form-control" required placeholder="Enter Email">
                                        <span style="color: red">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Phone Number</label>
                                    <div class="col-sm-10">
                                        <input type="number" value="{{ $getRecord->phone_number }}" name="phone_number" class="form-control" placeholder="Enter Phone Number">
                                        <span style="color: red">{{ $errors->first('phone_number') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Hire Date <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="date" value="{{ $getRecord->hire_date }}" name="hire_date" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Job Name <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="job_id" class="form-control" required>
                                            <option value="">Job Title</option>
                                            @foreach ($getJobs as $item)
                                                <option {{ $getRecord->job_id == $item->id  ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->job_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Salary<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="salary" value="{{ $getRecord->salary }}" class="form-control" required placeholder="Enter Salary">
                                        <span style="color: red">{{ $errors->first('salary') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Commission PCT<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="commission_pct" value="{{ $getRecord->commission_pct }}" class="form-control" required placeholder="Enter Commission PCT">
                                        <span style="color: red">{{ $errors->first('commission_pct') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Image Profile<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="file" name="profile_image"  class="form-control">
                                        @if (!empty($getRecord->profile_image))
                                            @if (file_exists(public_path('images/profile/'.$getRecord->profile_image)))
                                                <img src="{{ asset('images/profile/'.$getRecord->profile_image) }}" style="width: 80px; height:80px" alt="avatar">
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Manager Name <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="manager_id" class="form-control" required>
                                            <option value="">Manager Name</option>
                                            @foreach ($getManagers as $item)
                                                <option {{ ($getRecord->manager_id == $item->id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->manger_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Department Name <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="department_id" class="form-control" required>
                                            <option value="">Department Name</option>
                                            @foreach ($getDepartments as $item)
                                                <option {{ ($getRecord->department_id == $item->id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->department_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{ url('admin/employees') }}" class="btn btn-default">Back</a>
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
