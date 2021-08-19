@extends('layouts.home')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Student Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboardv1') }}">Home</a></li>
                    <li class="breadcrumb-item active">Student Details</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->

    @if (Session::has('CohortSessions_updated'))
    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                {{Session::get('CohortSessions_updated')}}
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
                            <h3 class="card-title">Edit Session Type</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{route('cohortsession.update')}}" >
                            @csrf
                            <input type="hidden" name="id" value="{{$cohortsessions->id}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="sessionName">Session Name</label>
                                            <input name="sessionName" type="text" class="form-control"
                                                placeholder="Enter Session Name" value="{{$cohortsessions->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="academicYear">Academic Year</label>
                                            <input name="academicYear" type="text" class="form-control"
                                                placeholder="Enter Academic Year" value="{{$cohortsessions->academic_year}}">
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="sessionType">Session Type</label>
                                            <input name="sessionType" type="text" class="form-control"
                                                placeholder="Enter Academic Year" value="{{ $cohortsessions->sessionType->id}}">
                                        </div> --}}
                                        <div class="form-group">
                                            <label>Session Type</label>
                                            <select name="sessionType" class="form-control">
                                                {{-- <option value="{{$cohortsessions->sessionType->id}}">
                                                    {{$cohortsessions->sessionType->name}}
                                                </option> --}}

                                                {{-- TOBE WORKED ON --}}

                                                @if ($cohortsessions->sessionType->id && $cohortsessions->sessionType->name)
                                                    <option value="{{$cohortsessions->sessionType->id}}">
                                                        {{$cohortsessions->sessionType->name}}
                                                    </option>
                                                    <option>TO WORK ON</option>
                                                @else
                                                    <option value="{{$cohortsessions->sessionType->id}}">
                                                        {{$cohortsessions->sessionType->name}}
                                                    </option>
                                                    <option>TO WORK ON</option>
                                                @endif

                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Start Date</label>
                                            <div class="input-group date" id="startdate"
                                                data-target-input="nearest">
                                                <input name="startdate" type="text" class="datetimepicker-input form-control"
                                                    data-target="#startdate" placeholder="yyyy-mm-dd" value="{{$cohortsessions->start_date}}">
                                                <div class="input-group-append" data-target="#startdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>End Date</label>
                                            <div class="input-group date" id="enddate"
                                                data-target-input="nearest">
                                                <input name="enddate" type="text" class="datetimepicker-input form-control"
                                                    data-target="#enrollmentdate" placeholder="yyyy-mm-dd" value="{{$cohortsessions->end_date}}">
                                                <div class="input-group-append" data-target="#enddate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Cohort Session</button>
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
