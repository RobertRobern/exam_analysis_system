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
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-gradescale">
                            Grade Scale
                        </button>

                    </div>

                    <!-- /.card -->
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- ./row -->
    </div><!-- /.container-fluid -->

    <!-- modal-gradescale -->
    <div class="modal fade modal-top-lg" id="modal-gradescale">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('gradescale.save')}}" method="POST">
                    @csrf
                    <input type="hidden" name="grade_id" value="{{$grades->id}}">

                    <div class="modal-header">
                        <h4 class="modal-title">Add Grade Scale ({{$grades->name}})</h4>
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
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="gradeLetter">Grade Letter</label>
                                                    <input name="gradeLetter" type="text" class="@error('gradeLetter')
                                                    is-invalid
                                                    @enderror form-control"
                                                        placeholder="Enter Grade Letter" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="gradePoint">Grade Point</label>
                                                    <input name="gradePoint" type="number" class="@error('gradePoint')
                                                    is-invalid
                                                    @enderror form-control"
                                                        placeholder="Enter Grade Point" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="minimumMarks">Minimum Marks</label>
                                                    <input name="minimumMarks" type="text" class="@error('minimumMarks')
                                                    is-invalid
                                                    @enderror form-control"
                                                        placeholder="Enter Minimum Marks" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="maximumMarks">Maximum Marks</label>
                                                    <input name="maximumMarks" type="text" class="@error('maximumMarks')
                                                    is-invalid
                                                    @enderror form-control"
                                                        placeholder="Enter Maximum Marks" required>
                                                </div>
                                            </div>
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
                <h3 class="card-title">List of Grade Scale ({{$grades->name}})</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            {{-- <th># No</th> --}}
                            <th>Numeric Aggregate Grade</th>
                            <th>Letter Grade</th>
                            <th>Grade Point</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gradescales as $gradescale)
                        @if ($gradescale->grade->id == $grades->id)
                        <tr>
                            {{-- <td>{{ $loop->index+1}}</td> --}}
                            <td>{{ $gradescale->min_mark}} <strong>-</strong> {{ $gradescale->max_mark}}</td>
                            <td>{{ $gradescale->letter_grade}}</td>
                            <td>{{ $gradescale->grade_point}}</td>
                            <td>
                                <a class="btn-primary btn-xs space" href="/edit-gradescale/{{$grades->id}}/{{ $gradescale->id}}">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a class="btn-danger btn-xs space" href="/delete-gradescale/{{ $gradescale->id}}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        @endif

                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            {{-- <th># No</th> --}}
                            <th>Numeric Aggregate Grade</th>
                            <th>Letter Grade</th>
                            <th>Grade Point</th>
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
