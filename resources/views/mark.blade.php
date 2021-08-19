@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Mark Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboardv1') }}">Home</a></li>
                    <li class="breadcrumb-item active">Mark Details</li>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-mark">
                            Mark
                        </button>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- ./row -->
    </div><!-- /.container-fluid -->

    <!-- modal-mark -->
    <div class="modal fade modal-top-lg" id="modal-mark">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {{-- <form class="btn-submit" action="" method="POST"> --}}
                    <form action="{{ route('mark.save')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Add Mark</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- <p>One fine body&hellip;</p> -->

                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                <div class="card card-primary">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Exam Name</label>
                                                    <select name="examName" class="@error('examName') is-invalid
                                                    @enderror select2bs4" style="width: 100%;" required>
                                                    {{-- @foreach ($exams as $exam )
                                                    <option value="{{ $exam->id}}">{{ $exam->name}}</option>
                                                    @endforeach --}}


                                                        {{-- @foreach ($marks as $mark)
                                                        <option value="{{ $mark->student->id }}">
                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>{{ $mark->student->surname }}</td>
                                                                        <td>{{ $mark->student->fname }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </option>
                                                        @endforeach --}}

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Grade Name</label>
                                                    {{-- <select name="gradeName" class="@error('gradeName') is-invalid --}}
                                                    {{-- @enderror select2bs4" style="width: 100%;" required> --}}
                                                    {{-- @foreach ($grades as $grade )
                                                    <option value="{{ $grade->id}}">{{ $grade->name}}</option>
                                                    @endforeach --}}

                                                        {{-- @foreach ($marks as $mark)
                                                        <option value="{{ $mark->subject->id }}">
                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>{{ $mark->subject->code }}</td>
                                                                        <td>{{ $mark->subject->name }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </option>
                                                        @endforeach --}}

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div> -->
                                    <!-- </form> -->
                                </div>
                                <!-- /.card -->
                            </div><!-- /.container-fluid -->
                        </section>
                        <!-- /.content -->

                        <section class="content">
                            <div class="container-fluid">
                                <!-- general form elements -->
                                <div class="card card-primary">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Student Name</label>
                                                    <select name="studentName" class="@error('studentName') is-invalid
                                                    @enderror select2bs4" style="width: 100%;" required>
                                                        {{-- @foreach ($classes as $class )
                                                        @foreach ($class->students as $student)
                                                        <option value="{{ $student->id}}">{{$student->name}}</option>

                                                        @endforeach

                                                        @endforeach --}}

                                                        {{-- @foreach ($marks as $mark)
                                                        <option value="{{ $mark->student->id }}">
                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>{{ $mark->student->surname }}</td>
                                                                        <td>{{ $mark->student->fname }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </option>
                                                        @endforeach --}}

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Subject Name</label>
                                                    <select name="subjectName" class="@error('subjectName') is-invalid
                                                    @enderror select2bs4" style="width: 100%;" required>
                                                        {{-- @foreach ($subjects as $subject )
                                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                        @endforeach --}}

                                                        {{-- @foreach ($marks as $mark)
                                                        <option value="{{ $mark->subject->id }}">
                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>{{ $mark->subject->code }}</td>
                                                                        <td>{{ $mark->subject->name }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </option>
                                                        @endforeach --}}

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

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
                        {{-- <button class="btn btn-primary">Save</button> --}}
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

{{-- Search --}}

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline">
                    <div class="card-header">
                        <form action="{{ route('mark')}}" method="GET">
                            @csrf
                            <section class="content">
                                <div class="container-fluid">
                                    <div class="card card-primary">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="studentName" class="col-sm-4 col-form-label">Student Name:</label>
                                                            <div class="col-sm-8">
                                                                <input type="search" class="form-control" name="studentName" placeholder="Search...">
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="subjectName" class="col-sm-4 col-form-label">Subject:</label>
                                                        <div class="col-sm-8">
                                                            <input type="search" class="form-control" name="subjectName" placeholder="Search..." required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="examName" class="col-sm-4 col-form-label">Exam:</label>
                                                            <div class="col-sm-8">
                                                                <select name="examName" class="form-control" style="width: 100%;">
                                                                    {{-- @foreach ($exams as $exam )
                                                                        <option value="{{ $exam->id}}">{{ $exam->name}}</option>

                                                                    @endforeach --}}
                                                                </select>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="className" class="col-sm-4 col-form-label">Class:</label>
                                                        <div class="col-sm-8">
                                                            <select name="className" class="form-control" style="width: 100%;">
                                                                {{-- @foreach ($classes as $class)
                                                                    <option value="{{ $class->name }}">{{ $class->name }}</option>
                                                                @endforeach --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="cohortSession" class="col-sm-4 col-form-label">Cohort Session:</label>
                                                            <div class="col-sm-8">
                                                                <select name="cohortSession" class="form-control" style="width: 100%;">
                                                                    {{-- @foreach ($cohorts as $cohort)
                                                                    <option value="{{ $cohort->name }}">{{ $cohort->name }}</option>
                                                                    @endforeach --}}
                                                                </select>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        {{-- @foreach ($cohorts as $cohort ) --}}
                                                        <label for="cohortYear" class="col-sm-4 col-form-label">Year:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="subjectName" value="" disabled>
                                                        </div>
                                                        {{-- @endforeach --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="justify-content-between">
                                                        <button type="submit" class="btn btn-primary">Apply</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </form>
                    </div><!-- /.card -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- ./row -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->

{{-- Search --}}

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                {{-- @if ($marks)
                @foreach ($marks as $mark) --}}
                {{-- <h3 class="card-title">Marks Lists ( <strong>{{ $mark->subjectcode}} : {{ $mark->subjectname}}</strong> )</h3> --}}
                {{-- @endforeach
                @else --}}
                <h3 class="card-title">Marks Lists</h3>
                {{-- @endif --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        {{-- @if ($marks) --}}
                        <tr>
                            <th>No #</th>
                            <th>Student Adm No</th>
                            <th>Student Name</th>
                            <th>Subject Name</th>
                            <th>Subject Code</th>
                            <th>Total Marks</th>
                            <th style="width: 50px">Marks Obtained</th>
                            <th style="width: 50px">Percentage</th>
                            <th style="width: 50px">Grade</th>
                            <th style="width: 50px">Grade Point</th>
                            <th>Action</th>
                        </tr>
                        {{-- @endif --}}

                    </thead>
                    <tbody>
                        {{-- @if ($marks)
                        @foreach ($marks as $mark) --}}
                        <tr>
                            {{-- <td>{{ $loop->index+1 }}</td>
                            <td>{{ $mark->studentAdminno }}</td>
                            <td>{{ $mark->studentName }}</td>
                            <td>{{ $mark->subjectname }}</td>
                            <td>{{ $mark->subjectcode }}</td> --}}
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                {{-- <input id="inputdisplay"  type="text" class="form-control" value="" > --}}
                                {{-- {{ $mark->totalMarks}} --}}
                            </td>
                            <td>
                                <input id="inputdisplay"  type="text" class="form-control" value="" >
                                {{-- {{ $mark->obtainedMarks }} --}}
                            </td>
                            <td>
                                <input id="inputdisplay"  type="text" class="form-control" value="" >
                            </td>
                            <td>
                                {{-- <input id="inputdisplay"  type="text" class="form-control" value="" > --}}
                                <select id="inputdisplay" name="grade" class="@error('studentName') is-invalid
                                    @enderror form-control" style="width: 100%;" title="Select Grade Letter">
                                    {{-- <option value=""></option> --}}
                                    {{-- @foreach ($grades->gradescale as $grade )
                                    <option value="{{ $grade->id}}">{{ $grade->letter_grade}}</option>
                                    @endforeach --}}
                            </td>
                            <td>
                                <select id="inputdisplay" name="grade" class="@error('studentName') is-invalid
                                    @enderror form-control" style="width: 100%;"  title="Select Grade Point">
                                    {{-- <option value=""></option> --}}
                                    {{-- @foreach ($grades->gradescale as $grade )
                                    <option value="{{ $grade->id}}">{{ $grade->grade_point}}</option>
                                    @endforeach --}}

                            </td>
                            <td>
                                {{-- <a class="btn-success btn-xs space" href="/grade/{{$grade->id}}">
                                    <i class="fas fa-expand-arrows-alt"></i>
                                </a> --}}
                                {{-- <a href="/grade/{{$grade->id}}"><button type="button" class="btn btn-primary">
                                    Add Scale
                                </button>
                            </a> --}}

                                <a id="tooltip" class="btn-primary btn-xs space" href="/edit-mark/" title="Edit">
                                    <i class="fas fa-edit" title="Edit"></i>
                                </a>

                                <a id="tooltip" class="btn-danger btn-xs space" href="/delete-mark/" title="Delete">
                                    <i class="fas fa-trash-alt" title="Delete"></i>
                                </a>

                            </td>
                        </tr>
                        {{-- @endforeach
                        @endif --}}

                    </tbody>
                    <tfoot>
                        {{-- @if ($marks) --}}

                        <tr>
                            <th>No #</th>
                            <th>Student Adm No</th>
                            <th>Student Name</th>
                            <th>Subject Name</th>
                            <th>Subject Code</th>
                            <th>Total Marks</th>
                            <th>Marks Obtained</th>
                            <th>Percentage</th>
                            <th>Grade</th>
                            <th>Grade Point</th>
                            <th>Action</th>
                        </tr>
                        {{-- @endif --}}
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</section>
<!-- /.content -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <table  class="table table-bordered table-striped">
                    <thead>
                        {{-- @if ($marks) --}}

                        <tr>
                            <th>Total Marks</th>
                            <th>Marks Obtained</th>
                            <th>Percentage</th>
                            <th>Final Grade</th>
                            <th>Final Result</th>
                        </tr>
                        {{-- @endif --}}

                    </thead>
                    <tbody>
                        {{-- @if ($marks)
                        @foreach ($marks as $mark) --}}
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        {{-- @endforeach

                        @endif --}}


                    </tbody>
                    <tfoot>
                        {{-- @if ($marks) --}}
                        <tr>
                            <th>Total Marks</th>
                            <th>Marks Obtained</th>
                            <th>Percentage</th>
                            <th>Final Grade</th>
                            <th>Final Result</th>
                        </tr>
                        {{-- @endif --}}
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</section>

@push('script')
<script type="text/javascript">
    $(function() {
        $("#inputdisplay").tooltip();
        $("#tooltip").tooltip({ { my: "left top+15", at: "left bottom", collision: "flipfit" } });
    });


</script>

@endpush


@endsection
