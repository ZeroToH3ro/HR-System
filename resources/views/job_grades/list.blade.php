@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Job Grades</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
            <a class="btn btn-success" href="{{ url('admin/job_grades/add') }}" class="btn btn-primary mb-2">Add Job Grades</a>
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
                            <h3 class="card-title">Search Job Grades</h3>
                        </div>

                        <form action="" method="get">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-1">
                                        <label>ID</label>
                                        <input type="text" name="id" class="form-control" value="{{ Request()->id }}">
                                    </div>

                                    <div class="form-group col-md-1">
                                        <label>Grade Level</label>
                                        <input type="text" name="grade_level" class="form-control" value="{{ Request()->grade_level }}">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label>Low Salary</label>
                                        <input type="text" name="lowest_sal" class="form-control" value="{{ Request()->lowest_sal }}">
                                    </div>

                                    <div class="form-group col-md-1">
                                        <label>High Salary</label>
                                        <input type="text" name="highest_sal" class="form-control" value="{{ Request()->high_sal }}">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Created At</label>
                                        <input type="date" name="created_at" class="form-control" value="{{ Request()->created_at }}">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Updated At</label>
                                        <input type="date" name="updated_at" class="form-control" value="{{ Request()->updated_at }}">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <button class="btn btn-primary" style="margin-top: 30px" type="submit">Search</button>
                                        <a href="{{ url('admin/job_grades') }}" style="margin-top: 30px" class="btn btn-info" >Reset</a>
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
                                        <th>Grade Level</th>
                                        <th>Low Salary</th>
                                        <th>High Salary</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($getRecords as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->grade_level }}</td>
                                        <td>{{ $item->lowest_sal }}</td>
                                        <td>{{ $item->highest_sal }}</td>
                                        <td>{{ date('d-m-Y H:i A', strtotime($item->created_at)) }}</td>
                                        <td>{{ date('d-m-Y H:i A', strtotime($item->updated_at)) }}</td>
                                        <td>
                                            <a href="{{ url('admin/job_grades/edit/'.$item->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ url('admin/job_grades/'.$item->id) }}" class="btn btn-info">View</a>
                                            <a href="{{ url('admin/job_grades/delete/'.$item->id) }}" onclick="return confirm('Are you sure want to delete ?')" class="btn btn-danger">Delete</a>
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
                                {{-- {!! $getRecords->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} --}}
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
