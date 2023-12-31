@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Payroll</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
            <ol class="breadcrumb float-sm-right">
                <a href="{{ url('admin/payroll/add') }}" class="btn btn-primary mb-2 mr-1">Add New Payrolls</a>
                <form action="{{ url('admin/payroll_export') }}" method="get">
                    <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
                    <input type="hidden" name="end_date" value="{{ Request()->end_date }}">
                    <a class="btn btn-success mb-2" href="{{ url('admin/payroll_export/?start_date='.Request::get('start_date').'&end_date='.Request::get('end_date')) }}">Export Excel</a>
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
                            <h3 class="card-title">Search Payroll</h3>
                        </div>

                        <form action="" method="get">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>ID</label>
                                        <input type="text" name="id" class="form-control" placeholder="Enter id" value={{ Request()->id }} >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Employment Name</label>
                                        <input type="text" name="employee_id" class="form-control" placeholder="Enter name" value={{ Request()->employee_id }}>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Number Of Day Works</label>
                                        <input type="text" name="number_of_day_work" class="form-control" placeholder="Enter number of day work" value={{ Request()->number_of_day_work }}>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Bonus</label>
                                        <input type="text" name="bonus" class="form-control" placeholder="Enter bonus" value={{ Request()->bonus }}>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Overtime</label>
                                        <input type="text" name="overtime" class="form-control" placeholder="Enter overtime" value={{ Request()->overtime }}>
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
                                        <a href="{{ url('admin/payroll') }}" class="btn btn-success" style="margin-top: 30px">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @include('_message')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Payroll List
                            </h3>
                        </div>

                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Employee Name</th>
                                        <th>Days Work</th>
                                        <th>Bonus</th>
                                        <th>Overtime</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalBonus = 0;
                                        $totalOvertime = 0;
                                        $totalDayWorks = 0;
                                    @endphp

                                    @forelse ($getRecords as $value)
                                    @php
                                         $totalBonus += $value->bonus;
                                         $totalOvertime += $value->overtime;
                                         $totalDayWorks += $value->number_of_day_work;
                                    @endphp
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name}}</td>
                                        <td>{{ $value->number_of_day_work }}</td>
                                        <td>{{ $value->bonus }}</td>
                                        <td>{{ $value->overtime }}</td>
                                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                        <td>
                                            <a href="{{ url('admin/payroll/'.$value->id) }}" class="btn btn-info">View</a>
                                            <a href="{{ url('admin/payroll/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ url('admin/payroll/delete/'.$value->id) }}" onclick="return confirm('Are you sure want to delete this ?')" class="btn btn-danger">Delete</a>
                                        </td>
                                    @empty
                                    </tr>
                                        <tr>
                                            <td colspan="100%"> No Record Found </td>
                                        </tr>
                                     @endforelse
                                     <tr>
                                        <th colspan="2">Total</th>
                                        <td> {{ $totalDayWorks }} </td>
                                        <td> {{ $totalBonus }} </td>
                                        <td> {{ $totalOvertime }} </td>
                                     </tr>
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
@endsection
