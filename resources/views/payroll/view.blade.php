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
              <li class="breadcrumb-item"><a href="#">View</a></li>
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
                            <h3 class="card-title">View Payrolls</h3>
                        </div>

                        <form class="form-horizontal" action="" method="get">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Employement Name:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{ $payroll->get_single_employee->name }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Number of day works:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{ $payroll->number_of_day_work }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Bonus:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       {{ $payroll->bonus }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Overtime:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{ $payroll->overtime }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Gross Salary:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{ $payroll->gross_salary }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Cash Advance:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{ $payroll->cash_advance }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Later Hour:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{ $payroll->late_hours }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Absent Day:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{ $payroll->absent_days }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">SSS Contribution:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{ $payroll->sss_contribution }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Phil Health:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{ $payroll->philhealth }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Total Deduction:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{ $payroll->total_deductions }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Netpay:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{ $payroll->netpay }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Payroll Monthly:<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{ $payroll->payroll_monthly }}
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{ url('admin/payroll') }}" class="btn btn-default">Back</a>
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
