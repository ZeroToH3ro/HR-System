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
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add</a></li>
              <li class="breadcrumb-item active">Payroll</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="content-fluid">
            @include('_message')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Add Payrolls</h3>
                        </div>

                        <form class="form-horizontal" accept="{{ url('admin/payroll/add') }}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Employement Name:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="employee_id" class="form-control" required>
                                            <option value="">Employement Name</option>
                                            @foreach ($getEmployees as $item)
                                                <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Number of day works:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="number_of_day_work" value="{{ old('number_of_day_work') }}" class="form-control" required placeholder="Enter The Number Of Day Work:">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Bonus:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="bonus" value="{{ old('bonus') }}" class="form-control" required placeholder="Enter Bonus:">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Overtime:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="overtime" value="{{ old('overtime') }}" class="form-control" required placeholder="Enter Overtime:">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Gross Salary:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="gross_salary" value="{{ old('gross_salary') }}" class="form-control" required placeholder="Enter Gross Salary:">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Cash Advance:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="cash_advance" value="{{ old('cash_advance') }}" class="form-control" required placeholder="Enter Cash Advance:">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Later Hour:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="late_hours" value="{{ old('late_hours') }}" class="form-control" required placeholder="Enter Later Hour:">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Absent Day:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="absent_days" value="{{ old('absent_days') }}" class="form-control" required placeholder="Enter Absent Day:">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">SSS Contribution:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="sss_contribution" value="{{ old('sss_contribution') }}" class="form-control" required placeholder="Enter SSS Contribute:">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Phil Health:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="philhealth" value="{{ old('philhealth') }}" class="form-control" required placeholder="Enter Phil Health:">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Total Deduction:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="total_deductions" value="{{ old('total_deductions') }}" class="form-control" required placeholder="Enter Total Deduction:">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Netpay:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="netpay" value="{{ old('netpay') }}" class="form-control" required placeholder="Enter Net Pay:">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Payroll Monthly:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="payroll_monthly" value="{{ old('payroll_monthly') }}" class="form-control" required placeholder="Enter Payroll Monthly:">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{ url('admin/payroll') }}" class="btn btn-default">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<!-- /.content-wrapper -->
@endsection
