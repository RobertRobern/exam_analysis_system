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

    @if (Session::has('School_updated'))
    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                {{Session::get('School_updated')}}
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
                            <h3 class="card-title">Edit Student</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{route('student.update')}}" >
                            @csrf
                            <input type="hidden" name="id" value=" @isset($students) {{$students->id}} @endisset" >
                            {{-- <input type="hidden" name="schoolid" value="1"> --}}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="admissionNumber">Admission Number/UPI</label>
                                            <input name="admissionNumber" type="text" class="form-control"
                                                placeholder="Enter Admission Number" value="{{ old('admissionNumber') }}  @isset($students) {{$students->adminno}} @endisset">
                                        </div>
                                        <div class="form-group">
                                            <label for="studentname">Student Name</label>
                                            <input name="studentname" type="text" class="form-control"
                                                placeholder="Enter Surname" value="{{ $students->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth:</label>
                                            <div class="input-group date" id="dobdate"
                                                data-target-input="nearest">
                                                <input name="dateOfbirth" type="text" class="datetimepicker-input form-control"
                                                    data-target="#dobdate" value="{{ $students->dob }}">
                                                <div class="input-group-append" data-target="#dobdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- Select -->
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select name="gender" class="form-control">

                                                @if ($students->gender == 'Female')
                                                    <option>{{$students->gender}}</option>
                                                    <option>Male</option>
                                                @else
                                                    <option>{{$students->gender}}</option>
                                                    <option>Female</option>
                                                @endif

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Enrollment:</label>
                                            <div class="input-group date" id="enrollmentdate"
                                                data-target-input="nearest">
                                                <input name="dateOfEnrollment" type="text" class="datetimepicker-input form-control"
                                                    data-target="#enrollmentdate" value="{{ $students->enrollment }}">
                                                <div class="input-group-append" data-target="#enrollmentdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Group/Class</label>
                                            <select name="class" class="form-control">
                                                {{-- <option value="{{$students->classes->id}}">{{$students->classes->name}}</option> --}}
                                                @foreach ($classes as $class)
                                                @if ($class->name == $students->classes->name)
                                                <option value="{{ $students->classes->id }}" selected>{{ $class->name }}</option>
                                                @else
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-4">

                                        <!-- Select -->
                                        <div class="form-group">
                                            <label>Stream</label>
                                            <select name="stream" class="form-control">
                                                {{-- @foreach ($students->stream as $selected)
                                                <option>{{ $selected->name }}</option>

                                                @endforeach --}}

                                                @foreach ($streams as $stream)

                                                    @foreach ($students->stream as $selected)
                                                        {{-- <option>{{ $selected->name }}</option> --}}
                                                        @if ($stream->name == $selected->name)
                                                        <option value="{{ $selected->id }}" selected>{{ $selected->name }}</option>
                                                        @else
                                                        <option value="{{ $stream->id }}">{{ $stream->name }}</option>
                                                        @endif
                                                    @endforeach

                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Guardian/Parent</label>
                                            <select name="parent" class="select2bs4" style="width: 100%;">
                                                <option value="{{ $students->guardian->id }}" selected="selected">{{ $students->guardian->name }} </option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Assigned Subject:</label>
                                            <select name="subject[]" class="select2" multiple="multiple" data-placeholder="Any" style="width: 100%;">
                                                <option value=""></option>
                                                {{-- @foreach ($studentsubject as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->subject_id }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="studentsImage">Students Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Student</button>
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

@push('script')
<script>
$(function() {


    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
    })

    //Date picker
    $('#dobdate').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $('#enrollmentdate').datetimepicker({
        format: 'YYYY-MM-DD'
    });


})


</script>
@endpush

@endsection
