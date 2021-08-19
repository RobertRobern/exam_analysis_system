@extends('layouts.home')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Grading Scale</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboardv1') }}">Home</a></li>
                    <li class="breadcrumb-item active">Grading Scale</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->

    @if (Session::has('GradeScale_updated'))
    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                {{Session::get('GradeScale_updated')}}
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
                            <h3 class="card-title">Edit Grade Scale</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{route('gradescale.update')}}" >
                            @csrf
                            <input type="hidden" name="id" value="{{$gradescales->id}}">
                            <input type="hidden" name="gradeId" value="{{$grades->id}}">
                            <div class="card-body">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="gradeLetter">Grade Letter</label>
                                        <input name="gradeLetter" type="text" class="form-control"
                                            placeholder="Enter Grade Letter" value="{{ $gradescales->letter_grade }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="gradePoint">Grade Point</label>
                                        <input name="gradePoint" type="number" class="form-control"
                                            placeholder="Enter Grade Point" value="{{ $gradescales->grade_point }}">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="minimumMarks">Minimum Marks</label>
                                        <input name="minimumMarks" type="text" class="form-control"
                                            placeholder="Enter Minimum Marks" value="{{ $gradescales->min_mark }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="maximumMarks">Maximum Marks</label>
                                        <input name="maximumMarks" type="text" class="form-control"
                                            placeholder="Enter Maximum Marks" value="{{ $gradescales->max_mark }}">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Grade Scale</button>
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
