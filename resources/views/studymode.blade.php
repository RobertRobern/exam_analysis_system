@extends('layouts.home')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Study Mode Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboardv1') }}">Home</a></li>
                    <li class="breadcrumb-item active">Study Mode Details</li>
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

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-studymode">
                            Study Mode
                        </button>
                        <a href="{{ route('classes')}}"><button type="button" class="btn btn-primary">
                                Classes
                        </button></a>

                    </div>

                    <!-- /.card -->
                </div>


            </div>
            <!-- /.col -->
        </div>
        <!-- ./row -->
    </div><!-- /.container-fluid -->

    <!-- modal-stream -->
    <div class="modal fade modal-top" id="modal-studymode">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('studymode.save')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Add Study Mode</h4>
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

                                    <!-- form start -->
                                    <!-- <form> -->
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="studyMode">Study Mode Name</label>
                                            <input name="studyMode" type="text" class="@error('studyMode')
                                            is-invalid
                                            @enderror form-control" placeholder="Enter Study Mode Name">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
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

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Study Modes</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th># No</th>
                                    <th>Study Mode</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studymodes as $studymode)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $studymode->name }}</td>
                                    <td>
                                        <a target="" class="btn-primary btn-xs space" href="/edit-studymode/{{ $studymode->id}}">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a class="btn-danger btn-xs space" href="/delete-studymode/{{ $studymode->id}}">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th># No</th>
                                    <th>Study Mode</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

    </div>
</section>

@endsection
