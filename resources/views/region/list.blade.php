@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Region</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
                <a class="btn btn-success" href="{{ url('admin/regions/add') }}" class="btn btn-primary mb-2">Add New Region</a>
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
                            <h3 class="card-title">Search Region</h3>
                        </div>

                        <form action="" method="get">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>ID</label>
                                        <input type="text" name="id" class="form-control" value="{{ Request()->id }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Region Name</label>
                                        <input type="text" name="region_name" class="form-control" value="{{ Request()->region_name }}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Created At</label>
                                        <input type="date" name="created_at" class="form-control" value="{{ Request()->created_at}}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Updated At</label>
                                        <input type="date" name="updated_at" class="form-control" value="{{ Request()->updated_at}}">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <button type="submit" class="btn btn-primary" style="margin-top: 10px">Search</button>
                                        <a href="{{ url('admin/regions') }}" class="btn btn-success" style="margin-top: 10px">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @include('_message')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Regions List
                            </h3>
                        </div>

                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Region Name</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($getRecord as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->region_name}}</td>
                                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                        <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}</td>
                                        <td>
                                            <a href="{{ url('admin/regions/view/'.$value->id) }}" class="btn btn-info">View</a>
                                            <a href="{{ url('admin/regions/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ url('admin/regions/delete/'.$value->id) }}" onclick="return confirm('Are you sure want to delete this ?')" class="btn btn-danger">Delete</a>
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
