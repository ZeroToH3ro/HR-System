@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Regionss</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item active">Countries</li>
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
                            <h3 class="card-title">Edit Countries</h3>
                        </div>

                        <form class="form-horizontal" accept="{{ url('admin/regions/edit/'.$getRecord->id) }}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable"> Country Name <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="country_name" value="{{ $getRecord->country_name }}" class="form-control" required placeholder="Enter Country Name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable"> Region Name <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="regions_id" class="form-control" required>
                                            <option value="">Select Region Name</option>
                                            @foreach ($getRegions as $item)
                                                <option value="{{ $item->id }}" {{ ($item->id == $getRecord->regions_id) ? 'selected' : ' ' }}>{{ $item->region_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <a href="{{ url('admin/countries') }}" class="btn btn-default">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Update</button>
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
