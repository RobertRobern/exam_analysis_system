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
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-guardian">
                            Guardian
                        </button>
                        <a href="{{ route('student')}}"><button type="button" class="btn btn-primary">
                            Student
                        </button></a>

                    </div>

                    <!-- /.card -->
                </div>


            </div>
            <!-- /.col -->
        </div>
        <!-- ./row -->
    </div><!-- /.container-fluid -->


    @if (Session::has('Guardian_saved'))
    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                {{Session::get('Guardian_saved')}}
            </div>
        </div>
    </section>
    @endif


    {{-- @error('surname')
        <section class="content">
            <div class="container-fluid">
                <div class="alert alert-danger mt-1 mb-1">
                    {{ $message }}
                </div>
            </div>
        </section>
    @enderror --}}

    @if ($errors->any())
    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-danger">
                <h4>Whoops! Something went wrong</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    @endif

    <!-- modal-guardian -->
    <div class="modal fade modal-top-lg" id="modal-guardian">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('guardian.save')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Student's Guardian</h4>
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
                                                    <input name="idNumber" type="text"  class="@error('idNumber') is-invalid @enderror form-control"
                                                        placeholder="Enter ID Number">
                                                </div>
                                                <div class="form-group">
                                                    <label for="surname">Surname</label>
                                                    <input name="surname" type="text" class="@error('surname') is-invalid @enderror form-control"
                                                        placeholder="Enter Surame">
                                                </div>
                                                <div class="form-group">
                                                    <label for="firstname">First Name</label>
                                                    <input name="firstName" type="text" class="@error('firstName') is-invalid @enderror form-control"
                                                        placeholder="Enter First Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="othername">Other Name</label>
                                                    <input name="otherName" type="text" class="@error('otherName') is-invalid @enderror form-control"
                                                        placeholder="Enter Other Name">
                                                </div>


                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="proffession">Proffession</label>
                                                    <input name="profession" type="text" class="@error('profession') is-invalid @enderror form-control"
                                                        placeholder="Enter Proffession">
                                                </div>
                                                <div class="form-group">
                                                    <label for="phoneNumber">Phone Number</label>
                                                    <input name="phoneNumber" type="text" class="@error('phoneNumber') is-invalid @enderror form-control"
                                                        data-inputmask="&quot;mask&quot;: &quot;(+999) 99999-9999&quot;"
                                                        data-mask="" inputmode="text">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email Address</label>
                                                    <input name="email" type="email" class="@error('email') is-invalid @enderror form-control" id="emailaddress"
                                                        placeholder="Enter Email Address">
                                                </div>
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select name="gender" class="@error('gender') is-invalid @enderror form-control">
                                                        <option></option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <!-- /.card-body -->

                                    <!-- <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div> -->
                                    <!-- </form> -->
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
                <h3 class="card-title">List of Parents/Guardians</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            {{-- <th># No</th> --}}
                            <th>ID No</th>
                            <th>Surname Name</th>
                            <th>Other Name(s)</th>
                            <th>Phone Number</th>
                            <th>Profession</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guardians as $guardian)
                        <tr>
                            {{-- <td>{{$loop->index+1}}</td> --}}
                            <td>{{$guardian->idnumber}}</td>
                            <td>{{$guardian->surname}}</td>
                            <td>{{$guardian->fname}}<br/>{{$guardian->oname}}</td>
                            <td>{{$guardian->tel_number}}</td>
                            <td>{{$guardian->profession}}</td>
                            <td>{{$guardian->email}}</td>
                            <td>{{$guardian->gender}}</td>
                            <td>
                                <a target="" class="btn-primary btn-xs space" href="/edit-guardian/{{$guardian->id}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- <a data-target="#modal-schoolupdate"  data-toggle="modal"  class="btn-primary btn-xs space" href="" data-id="{{ $guardian->idno }}">
                                    <i class="fas fa-edit"></i>
                                </a> -->

                                <a class="btn-danger btn-xs space" href="/delete-guardian/{{$guardian->id}}">
                                    {{-- <i class="fas fa-trash-alt"></i> --}}
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            {{-- <th># No</th> --}}
                            <th>ID No</th>
                            <th>Surname Name</th>
                            <th>Other Name(s)</th>
                            <th>Phone Number</th>
                            <th>Profession</th>
                            <th>Email</th>
                            <th>Gender</th>
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
