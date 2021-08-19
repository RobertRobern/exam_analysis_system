@extends('layouts.home')
@section('subj-family')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Subject Family Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboardv1') }}">Home</a></li>
                    <li class="breadcrumb-item active">Subject Family Details</li>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modal-subj-family">
                            Subject Family
                        </button>
                        <a href="{{ route('subjects')}}"><button type="button" class="btn btn-primary">
                                Subject
                            </button>
                        </a>
                    </div>

                    <!-- /.card -->
                </div>


            </div>
            <!-- /.col -->
        </div>
        <!-- ./row -->
    </div><!-- /.container-fluid -->

    <!-- modal-subj-family -->
    <div class="modal fade modal-top" id="modal-subj-family">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('subjectfamily.save')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Subject Family Name</h4>
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

                                        <div class="form-group">
                                            <label for="subjectFamily">Subject Family Name</label>
                                            <input name="subjectFamily" type="text" class="@error('subjectFamily')
                                            is-invalid
                                            @enderror form-control"
                                                placeholder="Enter Subject Family Name" required>
                                        </div>

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
                <h3 class="card-title">List of Subject Family</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th># No</th>
                            <th>Subject Family Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjectfamilys as $subjectfamily)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $subjectfamily->name }}</td>
                            <td>
                                {{-- subjectfamily --}}
                                <a class="btn-primary btn-xs space" href="/edit-subjectfamily/{{ $subjectfamily->id }}">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a class="btn-danger btn-xs space" href="/delete-subjectfamily/{{ $subjectfamily->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th># No</th>
                            <th>Subject Family Name</th>
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
