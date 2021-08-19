@extends('layouts.home')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>School Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboardv1') }}">Home</a></li>
                    <li class="breadcrumb-item active">School Details</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->

    @if (Session::has('School_updated'))
    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                {{Session::get('School_updated')}}
            </div>
        </div>
    </section>
    @endif

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit School</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{route('school.update')}}" id="quickForm">
                            @csrf
                            <input type="hidden" name="id" value="{{$schools->id}}">
                            <div class="card-body">
                                <div class="row">


                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="schoolname">School Name</label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Enter School Name" value="{{$schools->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="countyname">County Name</label>
                                            <input type="text" name="county" class="form-control"
                                                placeholder="Enter County Name" value="{{$schools->county}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="subcountyname">Sub-County Name</label>
                                            <input type="text" name="subcounty" class="form-control"
                                                placeholder="Enter Sub-County Name" value="{{$schools->subcounty}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="postaladdress">Postal Address</label>
                                            <input type="text" name="postal_address" class="form-control"
                                                placeholder="Enter Postal Address" value="{{$schools->postal_address}}">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="postalcode">Postal Code</label>
                                            <input type="text" name="postal_code" class="form-control"
                                                placeholder="Enter Postal Code" value="{{$schools->postal_code}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="telnumber">Telephone Number</label>
                                            <input type="text" name="tel_number" class="form-control"
                                                data-inputmask="&quot;mask&quot;: &quot;(+999) 99999-9999&quot;"
                                                data-mask="" inputmode="text" value="{{$schools->tel_number}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="emailaddress">Email Address</label>
                                            <input type="email" name="email" class="form-control" id="emailaddress"
                                                placeholder="Enter Email Address" value="{{$schools->email}}">
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="studentsImage">Students Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update School</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</section>


@endsection