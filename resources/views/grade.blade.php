@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Grading Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboardv1') }}">Home</a></li>
                    <li class="breadcrumb-item active">Grading Details</li>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-grade">
                            Grade
                        </button>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- ./row -->
    </div><!-- /.container-fluid -->

    <!-- modal-grade -->
    <div class="modal fade modal-top" id="modal-grade" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('grade.save')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Add Grade</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                     {{-- <p>One fine body&hellip;</p> --}}

                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="gradeName">Grade Name</label>
                                            <input name="gradeName" type="text" class="form-control"
                                                placeholder="Enter Grade Name" required>
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
                <h3 class="card-title">Lists of Grades</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th># No</th>
                            <th>Grade Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($grades as $grade)
                        <tr>
                            {{-- <td>{{$loop->index + 1 }}</td> --}}
                            <td>{{$grade->id }}</td>
                            <td>{{$grade->name }}</td>
                            <td style="width: 20rem">

                                <a href="/grade/{{$grade->id}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Add Grade Scale">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <a href="/edit-grade/{{$grade->id}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Grade">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="/delete-grade/{{$grade->id}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Delete Grade">
                                    <i class="fas fa-trash-alt"></i> 
                                </a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th># No</th>
                            <th>Grade Name</th>
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

@push('script')
<script>
// $(function() {
//     $('[data-toggle="tooltip"]').tooltip()
//     $('#example').tooltip('show')

// })

// $(document).ready(function(){
//     $('[data-toggle="tooltip"]').tooltip();
// });

</script>
@endpush

@endsection
