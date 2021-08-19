@extends('layouts.home')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cohort Session Planner</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboardv1') }}">Home</a></li>
                    <li class="breadcrumb-item active">Cohort Session Planner</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<?php
// foreach ($classes as $class) {
//     dump($class->id);
// }

?>

<!-- Modal -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sessionplanner">
                            Cohort Session Planner
                        </button>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- ./row -->
    </div><!-- /.container-fluid -->

    <!-- modal-sessionplanner -->
    <div class="modal fade modal-top-lg" id="modal-sessionplanner">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('cohortsession.save')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Cohort Session Planner</h4>
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
                                            <input type="hidden" name="defaultschool" value="">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="sessionName">Session Name</label>
                                                    <input name="sessionName" type="text" class="@error('sessionName')
                                                    is-invalid
                                                    @enderror form-control"
                                                        placeholder="Enter Session Name" required autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label for="academicYear">Academic Year</label>
                                                    <input name="academicYear" type="text" class="@error('academicYear')
                                                    is-invalid
                                                    @enderror form-control"
                                                        placeholder="Enter Academic Year" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Session Type</label>
                                                    <select name="sessionType" class="@error('sessionType')
                                                    is-invalid
                                                    @enderror form-control" required>

                                                    @foreach ($sessiontypes as $sessiontype)
                                                        <option value="{{$sessiontype->id}}">{{ $sessiontype->name}}</option>
                                                    @endforeach

                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label>Start Date</label>
                                                    <div class="input-group date" id="startdate"
                                                        data-target-input="nearest">
                                                        <input name="startdate" type="text" class="@error('startdate')
                                                        is-invalid
                                                        @enderror datetimepicker-input form-control"
                                                            data-target="#startdate" placeholder="yyyy-mm-dd" required>
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
                                                        <input name="enddate" type="text" class="@error('enddate')
                                                        is-invalid
                                                        @enderror datetimepicker-input form-control"
                                                            data-target="#enrollmentdate" placeholder="yyyy-mm-dd" required>
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
                <h3 class="card-title">Cohort Sessions</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th># No</th>
                            <th>Session Name</th>
                            <th>Academic Year</th>
                            <th>Period</th>
                            <th>Session Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cohortsessions as $cohortsession)
                        <tr>
                            {{-- <td>{{ $loop->index+1 }}</td> --}}
                            <td>{{ $cohortsession->id }}</td>
                            <td>{{ $cohortsession->name }}</td>
                            <td>{{ $cohortsession->academic_year}}</td>
                            <td>{{ $cohortsession->start_date }} <strong>-</strong> {{ $cohortsession->end_date }}</td>
                            <td>{{$cohortsession->sessionType->name}}</td>
                            {{-- <td>{{ $cohortsession->find($cohortsession->session_type_id)->sessionType }}</td> --}}
                            <td>
                                <a target="" class="btn-primary btn-xs space" href="/edit-cohortsession/{{$cohortsession->id}}">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a class="btn-danger btn-xs space" href="/delete-cohortsession/{{$cohortsession->id}}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th># No</th>
                            <th>Session Name</th>
                            <th>Academic Year</th>
                            <th>Period</th>
                            <th>Session Type</th>
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
$(function() {


    //Datemask yyyy-mm-dd
    $('#datemask').inputmask('yyyy-mm-dd', {
        'placeholder': 'yyyy-mm-dd'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
    })

    //Date picker
    $('#startdate').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $('#enddate').datetimepicker({
        format: 'YYYY-MM-DD'
    });



})


</script>
@endpush


@endsection
