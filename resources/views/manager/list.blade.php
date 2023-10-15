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
          <div class="col-sm-6" style="text-align: right;">
            <ol class="breadcrumb float-sm-right">

                <form action="{{ url('admin/department_export') }}" method="get">
                    <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
                    <input type="hidden" name="end_date" value="{{ Request()->end_date }}">
                    <a href="{{ url('admin/manager_export?start_date='.Request::get('start_date').'&end_date='.Request::get('end_date')) }}" class="btn btn-info mb-1">Export Excel</a>
                </form>

                <a href="{{ url('admin/manager/add') }}" class="btn btn-primary mb-2 ml-1">Add New Manager</a>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Search Manager</h3>
        </div>

        <form action="" method="get">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-2">
                        <label>ID</label>
                        <input type="text" name="id" class="form-control" value="{{ Request()->id }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Manager Name</label>
                        <input type="text" name="manger_name" class="form-control" value="{{ Request()->manger_name }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Manager Email</label>
                        <input type="email" name="manager_email" class="form-control" value="{{ Request()->manager_email}}">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Manager Mobile</label>
                        <input type="number" name="manager_mobile" class="form-control" value="{{ Request()->manager_mobile }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label>From Date</label>
                        <input type="date" name="start_date" class="form-control" value="{{ Request()->start_date}}">
                    </div>
                    <div class="form-group col-md-2">
                        <label>To Date</label>
                        <input type="date" name="end_date" class="form-control" value="{{ Request()->end_date}}">
                    </div>

                    <div class="form-group col-md-3">
                        <button type="submit" class="btn btn-primary" style="margin-top: 10px">Search</button>
                        <a href="{{ url('admin/manager') }}" class="btn btn-success" style="margin-top: 10px">Reset</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @include('_message')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Manager List
            </h3>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Manager Name</th>
                        <th>Manager Email</th>
                        <th>Manager Mobile</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($getRecords as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->manger_name }}</td>
                        <td>{{ $value->manager_email }}</td>
                        <td>{{ $value->manager_mobile }}</td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                        <td>
                            <a href="{{ url('admin/manager/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('admin/manager/delete/'.$value->id) }}" onclick="return confirm('Are you sure want to delete this ?')" class="btn btn-danger">Delete</a>
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
