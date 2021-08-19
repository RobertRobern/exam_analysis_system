@extends('layouts.home')
@section('subject')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Subject Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboardv1') }}">Home</a></li>
                    <li class="breadcrumb-item active">Subject Details</li>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-subject">
                            Subject
                        </button>
                        <a href="{{ route('subj-family')}}"><button type="button" class="btn btn-primary">
                                Subject Family
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

    <!-- modal-subject -->
    <div class="modal fade modal-top-lg" id="modal-subject" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('subject.save')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Subject</h4>
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
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="subjectCode">Subject Code</label>
                                                    <input name="subjectCode" type="text" class="@error('subjectCode')
                                                    is-invalid
                                                    @enderror form-control"
                                                        placeholder="Enter Subject Code" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="subjectName">Subject Name</label>
                                                    <input name="subjectName" type="text" class="@error('subjectName')
                                                    is-invalid
                                                    @enderror form-control"
                                                        placeholder="Enter Subject Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="subjectFamily">Subject Family</label>
                                                    <select name="subjectFamily" class="@error('subjectFamily')
                                                    is-invalid
                                                    @enderror form-control select2bs4" style="width: 100%;" required>
                                                        <option selected="selected">None</option>
                                                        @foreach ($subjectfamilys as $subjectfamily)
                                                        <option value="{{ $subjectfamily->id }}">{{ $subjectfamily->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-6">

                                                <div class="form-group">
                                                    <label>Score ID</label>
                                                    <select class="form-control select2bs4" style="width: 100%;">
                                                        <option selected="selected">None</option>
                                                        <option>101</option>
                                                        <option>102</option>
                                                        <option>103</option>
                                                        <option>104</option>
                                                    </select>
                                                </div>

                                            </div> --}}
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
                <h3 class="card-title">List of Subjects</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th># No</th>
                            <th>Subject Code</th>
                            <th>Subject Name</th>
                            <th>Subject Family</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $subject->code }}</td>
                            <td>{{ $subject->name }}</td>
                            <td>{{ $subject->subjectFamily->name }}</td>
                            <td>
                                <a class="btn-primary btn-xs space" href="/edit-subject/{{ $subject->id }}">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a class="btn-danger btn-xs space" href="/delete-subject/{{ $subject->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th># No</th>
                            <th>Subject Code</th>
                            <th>Subject Name</th>
                            <th>Subject Family</th>
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
