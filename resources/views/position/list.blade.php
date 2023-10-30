@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
                <ol class="breadcrumb float-sm-right">
                    <a href="{{ url('admin/position/add') }}" class="btn btn-primary mb-2 mr-1">Add New Position</a>
                    <form action="{{ url('admin/position_export') }}" method="get">
                        <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
                        <input type="hidden" name="end_date" value="{{ Request()->end_date }}">
                        <a class="btn btn-success mb-2" href="{{ url('admin/position_export/?start_date='.Request::get('start_date').'&end_date='.Request::get('end_date')) }}">Export Excel</a>
                    </form>
                </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="content-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Search Position</h3>
                        </div>

                        <form action="" method="get">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>ID</label>
                                        <input type="text" name="id" class="form-control" placeholder="Enter id" value={{ Request()->id }} >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Position Name</label>
                                        <input type="text" name="employee_id" class="form-control" placeholder="Enter name" value={{ Request()->employee_id }}>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Number Of Day Works</label>
                                        <input type="text" name="number_of_day_work" class="form-control" placeholder="Enter number of day work" value={{ Request()->number_of_day_work }}>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>From Date</label>
                                        <input type="date" name="start_date" class="form-control" value="{{ Request()->start_date}}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>To Date</label>
                                        <input type="date" name="end_date" class="form-control" value="{{ Request()->end_date}}">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <button type="submit" class="btn btn-primary" style="margin-top: 30px">Search</button>
                                        <a href="{{ url('admin/position') }}" class="btn btn-success" style="margin-top: 30px">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @include('_message')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Position List
                            </h3>
                        </div>

                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Position Name</th>
                                        <th>Daily Rate</th>
                                        <th>Monthly Rate</th>
                                        <th>Working Days Per Month</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($getRecords as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->position_name}}</td>
                                        <td>{{ $value->daily_rate }}</td>
                                        <td>{{ $value->monthly_rate }}</td>
                                        <td>{{ $value->working_days_per_month }}</td>
                                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                        <td>
                                            <a href="{{ url('admin/position/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ url('admin/position/delete/'.$value->id) }}" onclick="return confirm('Are you sure want to delete this ?')" class="btn btn-danger">Delete</a>
                                        </td>
                                    @empty
                                    </tr>
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
            </div>
        </div>
    </section>

</div>
<!-- /.content-wrapper -->
@endsection
