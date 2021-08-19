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
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-grade">
                            Exam
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
    <div class="modal fade modal-top" id="modal-grade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('exam.save')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Add Exam</h4>
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
                                            <label for="examName">Exam Name</label>
                                            <input name="examName" type="text" class="form-control"
                                                placeholder="Enter Exam Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Cohort Session</label>
                                            <select name="cohortSession" class="form-control"  required>
                                                @foreach ($exams as $exam)
                                                <option value="{{ $exam->cohortSession->id }}">{{ $exam->cohortSession->name}}</option>

                                                @endforeach

                                            </select>
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

<!-- Testing passing of data from controller -->
<?php
// var_dump($grade);
// foreach($grade as $eachGrade)
// {
//     // echo $eachGrade->grade_name_id;
//     $collection = collect([$eachGrade->grade_name]);
//     $count = $collection->count();
//     dd($collection);
//     // ddd($eachGrade);

// }
// $collection = collect(['category', 'php']);
//     $count = $collection->count();
//     ddd($collection);
//     // dd($count);



// // var_dump($grade_mappings);

// foreach($grade_mappings as $grademap)
// {

//     $collection = collect([$grademap->grade_name]);
//     $count = $collection->count();
//     dd($count);
//     // echo $eachGradeMap->letter_grade;
// }
// use App\Models\GradeMapping;
// $grademap_arr = GradeMapping::all();
// $countby = $grademap_arr->pluck('grade_name_id')->countBy();
// dd($countby);
// foreach ($countby as $key => $value) {
//     # code...
//     echo $key->$value;
//     // dd($key->$value);
// }


?>

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
                            <th>Exam Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($exams as $exam)

                        <tr>
                            <td>{{$loop->index + 1 }}</td>
                            {{-- <td>{{$grade->id }}</td> --}}
                            <td>{{$exam->name }}</td>
                            <td>
                                {{-- <a class="btn-success btn-xs space" href="/grade/{{$grade->id}}">
                                    <i class="fas fa-expand-arrows-alt"></i>
                                </a> --}}
                                {{-- <a href="/grade/{{$grade->id}}"><button type="button" class="btn btn-primary">
                                    Add Scale
                                </button>
                            </a> --}}

                                <a class="btn-primary btn-xs space" href="/edit-exam/{{$exam->id}}">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a class="btn-danger btn-xs space" href="/delete-exam/{{$exam->id}}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>

                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                    <tfoot>
                        <tr>
                            <th># No</th>
                            <th>Exam Name</th>
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
