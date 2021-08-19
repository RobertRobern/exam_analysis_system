@extends('layouts.home')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Exam Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboardv1') }}">Home</a></li>
                    <li class="breadcrumb-item active">Exam Details</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->

    @if (Session::has('Exam_updated'))
    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                {{Session::get('Exam_updated')}}
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
                            <h3 class="card-title">Edit Exam</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{route('exam.update')}}" >
                            @csrf
                            <input type="hidden" name="id" value="{{$exams->id}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="examName">Exam Name</label>
                                            <input name="examName" type="text" class="form-control"
                                                placeholder="Enter Exam Name" value="{{ $exams->name }}">
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="cohortSession">Cohort Session</label>
                                            <input name="cohortSession" type="text" class="form-control"
                                                placeholder="Enter Surname" value="{{ $exams->cohortSession->id }}">
                                        </div> --}}
                                        <!-- Select -->
                                        <div class="form-group">
                                            <label>Cohort Session</label>
                                            <select name="cohortSession" class="form-control">

                                                @if ($exams->cohort_session_id  == $exams->cohortSession->id  )
                                                    <option value="{{ $exams->cohortSession->id }}">{{ $exams->cohortSession->name }}</option>

                                                @else
                                                    <option>Female</option>
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Exam</button>
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
