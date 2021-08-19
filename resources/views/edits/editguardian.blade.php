@extends('layouts.home')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Parent/Guardian Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboardv1') }}">Home</a></li>
                    <li class="breadcrumb-item active">Parent/Guardian Details</li>
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
                        <form method="POST" action="{{route('guardian.update')}}" id="quickForm">
                            @csrf
                            <input type="hidden" name="id" value="{{$guardians->id}}">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="idNumber">ID Number</label>
                                            <input name="idNumber" type="text"  class=" form-control"
                                                placeholder="Enter ID Number" value="{{$guardians->idnumber}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="surname">Surname</label>
                                            <input name="surname" type="text" class="form-control"
                                                placeholder="Enter Surame" value=" {{$guardians->surname}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="firstname">First Name</label>
                                            <input name="firstName" type="text" class=" form-control"
                                                placeholder="Enter First Name" value=" {{$guardians->fname}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="othername">Other Name</label>
                                            <input name="otherName" type="text" class="form-control"
                                                placeholder="Enter Other Name" value="{{$guardians->oname}}">
                                        </div>


                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="profession">Profession</label>
                                            <input name="profession" type="text" class="form-control"
                                                placeholder="Enter Profession" value="{{$guardians->profession}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="phoneNumber">Phone Number</label>
                                            <input name="phoneNumber" type="text" class="form-control"
                                                data-inputmask="&quot;mask&quot;: &quot;(+999) 99999-9999&quot;"
                                                data-mask="" inputmode="text" value="{{$guardians->tel_number}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input name="email" type="email" class="form-control" id="emailaddress"
                                                placeholder="Enter Email Address" value="{{$guardians->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select name="gender" class="form-control">
                                                @if ($guardians->gender == 'Female')
                                                    <option>{{$guardians->gender}}</option>
                                                    <option>Male</option>
                                                @else
                                                    <option>{{$guardians->gender}}</option>
                                                    <option>Female</option>
                                                @endif
                                            </select>
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
