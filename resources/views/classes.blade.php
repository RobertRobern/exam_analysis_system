@extends('layouts.home')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Class Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboardv1') }}">Home</a></li>
                    <li class="breadcrumb-item active">Class Details</li>
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

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-class">
                            Classes
                        </button>
                        <a href="{{ route('streams')}}"><button type="button" class="btn btn-primary">
                                Streams
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

    <!-- modal-class -->
    <div class="modal fade modal-top-lg" id="modal-class" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('classes.save')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Classes</h4>
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
                                                    <label for="classname">Class Name</label>
                                                    <input name="classname" type="text" class="@error('classname')
                                                    is-invalid @enderror form-control"  placeholder="Enter Class Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Cohort Session</label>
                                                    <select name="cohortType" class="@error('cohortType')
                                                    is-invalid @enderror form-control" required>
                                                    <option value="">Select cohort session</option>
                                                    @foreach ($cohorts as $cohort)
                                                    <option value="{{ $cohort->id }}"> {{ $cohort->name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Start Date</label>
                                                    <div class="input-group date" id="startdate"
                                                        data-target-input="nearest">
                                                        <input name="startDate" type="text" class="@error('startDate')
                                                        is-invalid  @enderror datetimepicker-input form-control"
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
                                                        <input name="endDate" type="text" class="@error('endDate')
                                                        is-invalid @enderror datetimepicker-input form-control"
                                                            data-target="#enddate" placeholder="yyyy-mm-dd" required>
                                                        <div class="input-group-append" data-target="#enddate"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mode of Study</label>
                                                    <select name="modeOfStudy" class="@error('modeOfStudy')
                                                    is-invalid @enderror form-control" required>
                                                    <option value="">Select mode of study</option>
                                                    @foreach ($studymodes as $studymode)
                                                        <option value="{{ $studymode->id }}">{{ $studymode->name }}</option>
                                                    @endforeach

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Stream</label>
                                                    <select name="stream" class="@error('stream')
                                                    is-invalid @enderror form-control" required>
                                                    <option value="">Select stream</option>
                                                    @foreach ($streams as $stream)
                                                        <option value="{{ $stream->id }}">{{ $stream->name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <label for="notes">Notes</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <textarea name="notes" id="" cols="50" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                <h3 class="card-title">List of Classes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th># No</th>
                            <th>Class Name</th>
                            <th>Stream</th>
                            <th>Cohort Session</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Mode of Study</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- @foreach ($classes as $class)
                        <tr>
                            <td style="width: 20px">{{ $loop->index+1 }}</td>
                            <td style="width: 40px">{{ $class->name }}</td>
                            @empty($class->streamsMany)
                            <td style="width: 40px"><p style="text-align: center">__</p></td>
                            @endempty
                            @foreach ( $class->streamsMany as $stream )
                                <td style="width: 40px">{{ $stream->name}}</td>
                            @endforeach
                            @empty($class->cohortSession->name)
                            <td style="width: 40px"><p style="text-align: center">__</p></td>
                            @endempty
                            <td style="width: 100px">{{ $class->cohortSession->name }}</td>
                            <td style="width: 100px">{{ $class->start_date }}</td>
                            <td style="width: 100px">{{ $class->end_date }}</td>
                            <td style="width: 150px">{{ $class->studyMode->name }}</td>
                            <td>{{ $class->notes }}</td>
                            <td style="width: 40px">
                                <a target="" class="btn-primary btn-xs space" href="/edit-classes/{{ $class->id}}">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a class="btn-danger btn-xs space" href="/delete-classes/{{ $class->id}}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach --}}

                        @foreach ($streams as $stream)
                            @foreach ($stream->classesMany as $class)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $class->name }}</td>
                                <td>{{ $stream->name }}</td>
                                <td>{{ $class->cohortSession->name }}</td>
                                <td>{{ $class->start_date }}</td>
                                <td>{{ $class->end_date }}</td>
                                <td>{{ $class->studyMode->name }}</td>
                                <td>{{ $class->notes }}</td>
                                <td>
                                    <a target="" class="btn-primary btn-xs space" href="/edit-classes/{{ $class->id}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn-danger btn-xs space" href="/delete-classes/{{ $class->id}}">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th># No</th>
                            <th>Class Name</th>
                            <th>Stream</th>
                            <th>Cohort Session</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Mode of Study</th>
                            <th>Note</th>
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
