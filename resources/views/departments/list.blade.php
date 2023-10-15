@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Departments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
            <ol class="breadcrumb float-sm-right">

                <form action="{{ url('admin/department_export') }}" method="get">
                    <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
                    <input type="hidden" name="end_date" value="{{ Request()->end_date }}">
                    <a href="{{ url('admin/departments_export?start_date='.Request::get('start_date').'&end_date='.Request::get('end_date')) }}" class="btn btn-info mb-1">Export Excel</a>
                </form>

                <a href="{{ url('admin/departments/add') }}" class="btn btn-primary mb-2 ml-1">Add New Department</a>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @include('_message')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Search Employees</h3>
        </div>

        <form action="" method="get">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-2">
                        <label>ID</label>
                        <input type="text" name="id" class="form-control" value="{{ Request()->id }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label>Department Name</label>
                        <input type="text" name="department_name" class="form-control" value="{{ Request()->department_name }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label>Location Name</label>
                        <input type="text" name="street_address" class="form-control" value="{{ Request()->street_address }}">
                    </div>

                    <div class="form-group col-md-2">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-control" value="{{ Request()->start_date }}">
                    </div>

                    <div class="form-group col-md-2">
                        <label>End Date</label>
                        <input type="date" name="end_date" class="form-control" value="{{ Request()->end_date }}">
                    </div>

                    <div class="form-group col-md-3">
                        <button type="submit" class="btn btn-primary" style="margin-top: 30px">Search</button>
                        <a href="{{ url('admin/departments') }}" class="btn btn-success" style="margin-top: 30px">Reset</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Department List
            </h3>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Department Name</th>
                        <th>Location Name</th>
                        <th>Manager Name</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($getRecords as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->department_name }}</td>
                        <td>{{ $value->street_address }}</td>
                        <td>
                            @if ($value->manager_id == 1)
                                Elon Musk
                            @else
                                Bill Gate
                            @endif
                        </td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                        <td>
                            <a href="{{ url('admin/departments/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('admin/departments/delete/'.$value->id) }}" onclick="return confirm('Are you sure want to delete this ?')" class="btn btn-danger">Delete</a>
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
                {!! $getRecords->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
            </div>
        </div>
    </div>



</div>
<!-- /.content-wrapper -->
@endsection
