@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Job History</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
            <form action="{{ url('admin/job_history_export') }}" method="get">
                <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
                <input type="hidden" name="end_date" value="{{ Request()->end_date }}">
                <a href="{{ url('admin/job_history_export?start_date='.Request::get('start_date').'&end_date='.Request::get('end_date')) }}" class="btn btn-info mb-1">Export Excel</a>
            </form>
            <a class="btn btn-success" href="{{ url('admin/job_history/add') }}" class="btn btn-primary mb-2">Add Job History</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-md-12">
                    @include('_message')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Search Job History</h3>
                        </div>

                        <form action="" method="get">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>ID</label>
                                        <input type="text" name="id" placeholder="Enter ID" class="form-control" value="{{ Request()->id }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Name</label>
                                        <input type="text" name="name" placeholder="Enter Employee's Name" class="form-control" value="{{ Request()->name }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Start Date</label>
                                        <input type="date" name="start_date" class="form-control" value="{{ Request()->start_date }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>End Date</label>
                                        <input type="date" name="end_date" class="form-control" value="{{ Request()->end_date }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Job Title</label>
                                        <input type="text" name="job_title" placeholder="Enter Job's Name" class="form-control" value="{{ Request()->job_title}}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button class="btn btn-primary" style="margin-top: 30px" type="submit">Search</button>
                                        <a href="{{ url('admin/job_history') }}" style="margin-top: 30px" class="btn btn-info" >Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Job History List</h3>
                        </div>

                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Employee Name</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Department Name</th>
                                        <th>Job Name</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($getRecords as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ !empty($item->get_user_single->name) ?  $item->get_user_single->name : '' }}
                                                {{ !empty($item->get_user_single->last_name) ?  $item->get_user_single->last_name : '' }}
                                            </td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($item->start_date)) }}</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($item->end_date)) }}</td>
                                            <td>
                                                @if (!empty($item->department_id == 1))
                                                    Developer Department
                                                @else
                                                    BDM Department
                                                @endif
                                            </td>
                                            <td>{{ !empty($item->get_job_single->job_title) ?  $item->get_job_single->job_title : '' }}</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($item->created_at)) }}</td>
                                            <td>
                                                <a href="{{ url('admin/job_history/edit/'.$item->id) }}" class="btn btn-primary">Edit</a>
                                                <a href="{{ url('admin/job_history/'.$item->id) }}" class="btn btn-info">View</a>
                                                <a href="{{ url('admin/job_history/delete'.$item->id) }}" onclick="return confirm('Are you sure want to delete ?')" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="100%">No Record Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                             <div style="padding: 10px; float: right;">
                                {!! $getRecords->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>


</div>
<!-- /.content-wrapper -->
@endsection
