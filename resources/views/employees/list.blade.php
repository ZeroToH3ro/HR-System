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
          <div class="col-sm-6" style="text-align: right;">
            <ol class="breadcrumb float-sm-right">
                <a href="{{ url('admin/employees/add') }}" class="btn btn-primary mb-2">Add New Employee</a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="content-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Search Employees</h3>
                        </div>

                        <form action="" method="get">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-1">
                                        <label>ID</label>
                                        <input type="text" name="id" class="form-control" value="{{ Request()->id }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>First Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ Request()->name }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" class="form-control" value="{{ Request()->last_name }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button type="submit" class="btn btn-primary" style="margin-top: 30px">Search</button>
                                        <a href="{{ url('admin/employees') }}" class="btn btn-success" style="margin-top: 30px">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @include('_message')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Employees List
                            </h3>
                        </div>

                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Image Profile</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($getRecord as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->last_name }}</td>
                                        <td>{{ $value->email  }}</td>
                                        <td>{{ $value->phone_number }}</td>
                                        <td>
                                            @if (!empty($value->profile_image))
                                                @if (file_exists(public_path('images/profile/'.$value->profile_image)))
                                                    <img src="{{ asset('images/profile/'.$value->profile_image) }}" style="width: 80px; height:80px" alt="avatar">
                                                @endif
                                            @endif
                                        </td>
                                        <td>{{ !empty($value->is_role) ? 'HR' : 'Employee' }}</td>
                                        <td>
                                            <a href="{{ url('admin/employees/view/'.$value->id) }}" class="btn btn-info">View</a>
                                            <a href="{{ url('admin/employees/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ url('admin/employees/delete/'.$value->id) }}" onclick="return confirm('Are you sure want to delete this ?')" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="100%"> No Record Found </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <div style="padding: 10px; float: right;">
                                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</div>
<!-- /.content-wrapper -->
@endsection
