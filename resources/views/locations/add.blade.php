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
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add</a></li>
              <li class="breadcrumb-item active">Location</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="content-fluid">
            @include('_message')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"> Add Location</h3>
                        </div>

                        <form class="form-horizontal" accept="{{ url('admin/locations/add') }}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Street Address<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="street_address" value="{{ old('street_address') }}" class="form-control" required placeholder="Enter Street Address">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Postal Code<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="form-control" required placeholder="Enter Postal Code">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">City<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="city" value="{{ old('city') }}" class="form-control" required placeholder="Enter City">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">State Province<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="state_province" value="{{ old('state_province') }}" class="form-control" required placeholder="Enter State Province">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Country Name<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="countries_id">
                                            <option value="">Select Country Name</option>
                                            @foreach ($getCountries as $item)
                                                <option value="{{ $item->id }}">{{ $item->country_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <a href="{{ url('admin/locations') }}" class="btn btn-default">Back</a>
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
