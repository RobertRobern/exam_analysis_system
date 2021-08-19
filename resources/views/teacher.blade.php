@extends('layouts.home')
@section('teacher')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Teacher Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboardv1') }}">Home</a></li>
                    <li class="breadcrumb-item active">Teacher Details</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Modal -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-teacher">
                            Teacher
                        </button>
                        <!-- <a href="{{ route('teachers')}}"><button type="button" class="btn btn-primary">
                                Subject Family
                            </button>
                        </a> -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- ./row -->
    </div><!-- /.container-fluid -->

    <!-- modal-teacher-->
    <div class="modal fade modal-top-lg" id="modal-teacher">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Teacher</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- <p>One fine body&hellip;</p> -->

                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                <!-- general form elements -->
                                <div class="card card-primary">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="idNumber">ID Number</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter ID Number">
                                                </div>
                                                <div class="form-group">
                                                    <label for="surname">Surname</label>
                                                    <input type="text" class="form-control" placeholder="Enter Surname">
                                                </div>
                                                <div class="form-group">
                                                    <label for="fName">First Name</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter First Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="lName">Other Name</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Last Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Username">
                                                </div>
                                                <div class="form-group">
                                                    <label for="phoneNumber">Phone Number</label>
                                                    <input type="text" class="form-control"
                                                        data-inputmask="&quot;mask&quot;: &quot;(+999) 99999-9999&quot;"
                                                        data-mask="" inputmode="text">
                                                </div>
                                                <div class="form-group">
                                                    <label for="emailaddress">Email Address</label>
                                                    <input type="email" class="form-control" id="emailaddress"
                                                        placeholder="Enter Email Address">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control"
                                                        id="exampleInputPassword1" placeholder="Password">
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
                                </div>
                                <!-- /.card -->
                            </div><!-- /.container-fluid -->
                        </section>
                        <!-- /.content -->

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

</section>
<!-- /.content -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Teachers</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID No</th>
                            <th>Surname</th>
                            <th>First Name</th>
                            <th>Other Name</th>
                            <th>Username</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>292992992</td>
                            <td>Kevin</td>
                            <td>Calvin</td>
                            <td>Ochieng</td>
                            <td>Ochieng</td>
                            <td>254702139261</td>
                            <td>ndolorobern@gmail.com</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>292992992</td>
                            <td>Kevin</td>
                            <td>Calvin</td>
                            <td>Ochieng</td>
                            <td>Ochieng</td>
                            <td>254702139261</td>
                            <td>ndolorobern@gmail.com</td>
                            <td></td>
                        </tr>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID No</th>
                            <th>Surname</th>
                            <th>First Name</th>
                            <th>Other Name</th>
                            <th>Username</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</section>
<!-- /.content -->


@endsection