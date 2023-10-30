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
              <li class="breadcrumb-item"><a href="#">Add</a></li>
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
                            <h3 class="card-title"> Add Employee</h3>
                        </div>

                        <form class="form-horizontal" action="{{ url('admin/employees/add') }}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">First Name <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" required placeholder="Enter First Name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ old('last_name') }}" name="last_name" class="form-control" placeholder="Enter Last Name">
                                        <span style="color: red">{{ $errors->first('last_name') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Email<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="email" value="{{ old('email') }}" name="email" class="form-control" required placeholder="Enter Email">
                                        <span style="color: red">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Password<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="password" value="{{ old('password') }}" name="password" class="form-control" required placeholder="Enter Password">
                                        <span style="color: red">{{ $errors->first('password') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Phone Number</label>
                                    <div class="col-sm-10">
                                        <input type="number" value="{{ old('phone_number') }}" name="phone_number" class="form-control" placeholder="Enter Phone Number">
                                        <span style="color: red">{{ $errors->first('phone_number') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Hire Date <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="date" value="{{ old('hire_date') }}" name="hire_date" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Job Name <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="job_id" class="form-control" required>
                                            <option value="">Job Title</option>
                                            @foreach ($getJobs as $item)
                                                <option value="{{ $item->id }}"> {{ $item->job_title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Salary<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="salary" value="{{ old('salary') }}" class="form-control" required placeholder="Enter Salary">
                                        <span style="color: red">{{ $errors->first('salary') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Commission PCT<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="commission_pct" value="{{ old('commission_pct') }}" class="form-control" required placeholder="Enter Commission PCT">
                                        <span style="color: red">{{ $errors->first('commission_pct') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Image Profile<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="file" name="profile_image"  class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Manager Name <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="manager_id" class="form-control" required>
                                            <option value="">Manager Name</option>
                                            @foreach ($getManagers as $item)
                                                <option value="{{ $item->id }}">{{ $item->manger_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Department Name <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="department_id" class="form-control" required>
                                            <option value="">Department Name</option>
                                            @foreach ($getDepartments as $item)
                                                <option value="{{ $item->id }}">{{ $item->department_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Position Name <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="position_id" class="form-control" required>
                                            <option value="">Position Name</option>
                                            @foreach ($getPositions as $item)
                                                <option value="{{ $item->id }}">{{ $item->position_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{ url('admin/employees') }}" class="btn btn-default">Back</a>
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
