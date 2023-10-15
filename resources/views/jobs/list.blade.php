@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Job</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
                <form action="{{ url('admin/jobs_export') }}" method="get">
                    <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
                    <input type="hidden" name="end_date" value="{{ Request()->end_date }}">
                    <a class="btn btn-primary mb-2" href="{{ url('admin/jobs_export?start_date='.Request::get('start_date').'&end_date='.Request::get('end_date'))}}">
                        Export Excel
                    </a>
                </form>
                <a class="btn btn-success" href="{{ url('admin/jobs/add') }}" class="btn btn-primary mb-2">Add New Job</a>
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
                                        <label>Job Title</label>
                                        <input type="text" name="job_title" class="form-control" value="{{ Request()->job_title }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Min Salary</label>
                                        <input type="text" name="min_salary" class="form-control" value="{{ Request()->min_salary}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Max Salary</label>
                                        <input type="text" name="max_salary" class="form-control" value="{{ Request()->max_salary}}">
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
                                        <button type="submit" class="btn btn-primary" style="margin-top: 30px">Search</button>
                                        <a href="{{ url('admin/jobs') }}" class="btn btn-success" style="margin-top: 30px">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @include('_message')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Jobs List
                            </h3>
                        </div>

                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Min Salary</th>
                                        <th>Max Salary</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($getRecord as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->job_title }}</td>
                                        <td>{{ $value->min_salary }}</td>
                                        <td>{{ $value->max_salary }}</td>
                                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                        <td>
                                            <a href="{{ url('admin/jobs/view/'.$value->id) }}" class="btn btn-info">View</a>
                                            <a href="{{ url('admin/jobs/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ url('admin/jobs/delete/'.$value->id) }}" onclick="return confirm('Are you sure want to delete this ?')" class="btn btn-danger">Delete</a>
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
