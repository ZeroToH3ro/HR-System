@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Location</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
            <ol class="breadcrumb float-sm-right">
                <form action="{{ url('admin/locations_export') }}" method="get">
                    <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
                    <input type="hidden" name="end_date" value="{{ Request()->end_date }}">
                    <a class="btn btn-primary mb-1" href="{{ url('admin/locations_export?start_date='.Request::get('start_date').'&end_date='.Request::get('end_date'))}}">
                        Export Excel
                    </a>
                </form>
                <a class="btn btn-success mb-2 ml-1" href="{{ url('admin/locations/add') }}" class="btn btn-primary mb-2">Add New Location</a>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Search Jobs</h3>
        </div>

        <form action="" method="get">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>ID</label>
                        <input type="text" name="id" class="form-control" value="{{ Request()->id }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Street Address</label>
                        <input type="text" name="street_address" class="form-control" value="{{ Request()->street_address }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Postal Code</label>
                        <input type="text" name="postal_code" class="form-control" value="{{ Request()->postal_code}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label>City</label>
                        <input type="text" name="city" class="form-control" value="{{ Request()->city}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label>State Province</label>
                        <input type="text" name="state_province" class="form-control" value="{{ Request()->state_province}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Country Name</label>
                        <input type="text" name="country_name" class="form-control" value="{{ Request()->country_name}}">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Created At</label>
                        <input type="date" name="created_at" class="form-control" value="{{ Request()->created_at}}">
                    </div>
                    <div class="form-group col-md-2">
                        <label>From Date</label>
                        <input type="date" name="start_date" class="form-control" value="{{ Request()->start_date}}">
                    </div>
                    <div class="form-group col-md-2">
                        <label>To Date</label>
                        <input type="date" name="end_date" class="form-control" value="{{ Request()->end_date}}">
                    </div>

                    <div class="form-group col-md-5">
                        <button type="submit" class="btn btn-primary" style="margin-top: 10px">Search</button>
                        <a href="{{ url('admin/locations') }}" class="btn btn-success" style="margin-top: 10px">Reset</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @include('_message')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Countries List
            </h3>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Street Address</th>
                        <th>Postal Code</th>
                        <th>City</th>
                        <th>State Province</th>
                        <th>Countries Name</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($getRecords as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->street_address }}</td>
                        <td>{{ $value->postal_code }}</td>
                        <td>{{ $value->city }}</td>
                        <td>{{ $value->state_province }}</td>
                        <td>{{ $value->country_name}}</td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                        <td>
                            <a href="{{ url('admin/locations/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('admin/locations/delete/'.$value->id) }}" onclick="return confirm('Are you sure want to delete this ?')" class="btn btn-danger">Delete</a>
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
