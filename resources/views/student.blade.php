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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-student">
                            Student
                        </button>
                        <a href="{{ route('guardian')}}"><button type="button" class="btn btn-primary">
                            Guardian
                        </button></a>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-TEST">
                            TEST
                        </button>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- ./row -->
    </div><!-- /.container-fluid -->

    <!-- modal-student -->
    <div class="modal fade modal-top-lg" id="modal-student" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('student.save')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Student</h4>
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
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="admissionNumber">Admission Number/UPI</label>
                                                    <input name="admissionNumber" type="text" class="@error('admissionNumber')
                                                    is-invalid @enderror form-control" placeholder="Enter Admission Number" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="studentname">Student Name</label>
                                                    <input name="studentname" type="text" class="@error('studentname')
                                                    is-invalid @enderror form-control" placeholder="Enter Student Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Date of Birth:</label>
                                                    <div class="input-group date" id="dobdate"
                                                        data-target-input="nearest">
                                                        <input name="dateOfbirth" type="text" class="@error('dateOfbirth')
                                                        is-invalid @enderror datetimepicker-input form-control"
                                                            data-target="#dobdate" placeholder="yyyy-mm-dd" required>
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
                                                    <select name="gender" class="@error('gender')
                                                    is-invalid @enderror form-control" required>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Date of Enrollment:</label>
                                                    <div class="input-group date" id="enrollmentdate"
                                                        data-target-input="nearest">
                                                        <input name="dateOfEnrollment" type="text" class="@error('dateOfEnrollment')
                                                        is-invalid  @enderror datetimepicker-input form-control"
                                                            data-target="#enrollmentdate" placeholder="yyyy-mm-dd" required>
                                                        <div class="input-group-append" data-target="#enrollmentdate"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Class</label>
                                                    <select name="class" class="@error('class')
                                                    is-invalid @enderror form-control" required>
                                                        @foreach ($classes as $class)
                                                            <option value="{{$class->id}}">{{ $class->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <!-- Select -->
                                                <div class="form-group">
                                                    <label>Stream</label>
                                                    <select name="stream" class="@error('stream')
                                                    is-invalid @enderror form-control" required>
                                                        <option selected="selected">None</option>
                                                        @foreach ($streams as $stream)
                                                        <option value="{{$stream->id}}"> {{$stream->name}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Guardian/Parent</label>
                                                    <select name="parent" class="@error('parent') is-invalid
                                                    @enderror select2bs4" style="width: 100%;" required>
                                                        <option selected="selected">None</option>
                                                        @foreach ($guardians as $guardian)
                                                        <option value="{{$guardian->id}}"> {{$guardian->name}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Assign Subject:</label>
                                                    <select name="subject[]" class="select2" multiple="multiple"
                                                    data-placeholder="Any" style="width: 100%;" required>
                                                        @foreach ($subjects as $subject)
                                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                              <div id="stepper1"  class="bs-stepper">
                                                  <div class="bs-stepper-header" role="tablist">
                                                    <!-- your steps here -->
                                                    <div class="step" data-target="#student-part">
                                                      <button type="button" class="step-trigger" role="tab" aria-controls="student-part" id="student-part-trigger">
                                                        <span class="bs-stepper-circle">1</span>
                                                        <span class="bs-stepper-label">Student information</span>
                                                      </button>
                                                    </div>
                                                    <div class="line"></div>
                                                    <div class="step" data-target="#information-part">
                                                      <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                                        <span class="bs-stepper-circle">2</span>
                                                        <span class="bs-stepper-label">Other information</span>
                                                      </button>
                                                    </div>
                                                    <div class="line"></div>
                                                    <div class="step" data-target="#subject-part">
                                                      <button type="button" class="step-trigger" role="tab" aria-controls="subject-part" id="subject-part-trigger">
                                                        <span class="bs-stepper-circle">3</span>
                                                        <span class="bs-stepper-label">Subject information</span>
                                                      </button>
                                                    </div>
                                                  </div>

                                                  <div class="bs-stepper-content">
                                                    <!-- your steps content here -->
                                                    <div id="student-part" class="content" role="tabpanel" aria-labelledby="student-part-trigger">
                                                      <div class="col-md-12">
                                                          <div class="form-group">
                                                              <label for="admissionNumber">Admission Number/UPI</label>
                                                              <input id="myInput" name="admissionNumber" type="text" class="@error('admissionNumber')
                                                              is-invalid
                                                              @enderror form-control"
                                                                  placeholder="Enter Admission Number">
                                                          </div>
                                                          <div class="form-group">
                                                              <label for="studentname">Student Name</label>
                                                              <input id="myInput" name="studentname" type="text" class="@error('studentname')
                                                              is-invalid
                                                              @enderror form-control"
                                                                  placeholder="Enter Student Name">
                                                          </div>
                                                          <div class="form-group">
                                                              <label>Date of Birth:</label>
                                                              <div class="input-group date" id="dobdate"
                                                                  data-target-input="nearest">
                                                                  <input id="myInput" name="dateOfbirth" type="text" class="@error('dateOfbirth')
                                                                  is-invalid
                                                                  @enderror datetimepicker-input form-control"
                                                                      data-target="#dobdate" placeholder="yyyy-mm-dd">
                                                                  <div class="input-group-append" data-target="#dobdate"
                                                                      data-toggle="datetimepicker">
                                                                      <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="form-group">
                                                              <label>Gender</label>
                                                              <select id="myInput" name="gender" class="@error('gender')
                                                              is-invalid
                                                              @enderror form-control">
                                                                  <option>Male</option>
                                                                  <option>Female</option>
                                                              </select>
                                                          </div>
                                                      </div>
                                                      <button class="btn btn-primary" onclick="stepper1.next().preventDefault()">Next</button>
                                                    </div>
                                                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                                      <div class="col-md-12">
                                                          <div class="form-group">
                                                              <label>Date of Enrollment:</label>
                                                              <div class="input-group date" id="enrollmentdate"
                                                                  data-target-input="nearest">
                                                                  <input name="dateOfEnrollment" type="text" class="@error('dateOfEnrollment')
                                                                  is-invalid
                                                                  @enderror datetimepicker-input form-control"
                                                                      data-target="#enrollmentdate" placeholder="yyyy-mm-dd">
                                                                  <div class="input-group-append" data-target="#enrollmentdate"
                                                                      data-toggle="datetimepicker">
                                                                      <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="form-group">
                                                              <label>Class</label>
                                                              <select name="class" class="@error('class')
                                                              is-invalid
                                                              @enderror form-control">

                                                              @foreach ($classes as $class)
                                                                  <option value="{{$class->id}}">{{ $class->name}}</option>
                                                              @endforeach

                                                              </select>
                                                          </div>
                                                          <!-- Select -->
                                                          <div class="form-group">
                                                              <label>Stream</label>
                                                              <select name="stream" class="@error('stream')
                                                              is-invalid
                                                              @enderror form-control">
                                                              <option selected="selected">None</option>
                                                              @foreach ($streams as $stream)
                                                              <option value="{{$stream->id}}"> {{$stream->name}} </option>
                                                              @endforeach
                                                              </select>
                                                          </div>
                                                          <div class="form-group">
                                                              <label>Guardian/Parent</label>
                                                              <select name="parent" class="@error('parent') is-invalid
                                                              @enderror select2bs4" style="width: 100%;">
                                                                  <option selected="selected">None</option>

                                                                  @foreach ($guardians as $guardian)
                                                                  <option value="{{$guardian->id}}">
                                                                      <table>
                                                                          <tbody>
                                                                              <tr>
                                                                                  <td>{{$guardian->name}}</td>
                                                                              </tr>
                                                                          </tbody>
                                                                      </table>
                                                                  </option>
                                                                  @endforeach

                                                              </select>
                                                          </div>
                                                      </div>
                                                      <button class="btn btn-primary" onclick="stepper1.previous().preventDefault()">Previous</button>
                                                      <button class="btn btn-primary" onclick="stepper1.next().preventDefault()">Next</button>
                                                    </div>
                                                    <div id="subject-part" class="content" role="tabpanel" aria-labelledby="subject-part-trigger">
                                                      <div class="col-md-12">
                                                          <div class="form-group">
                                                              <label>Assign Subject:</label>
                                                              <select name="subject[]" class="select2" multiple="multiple" data-placeholder="Any" style="width: 100%;">

                                                                  @foreach ($subjects as $subject)
                                                                  <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                                  @endforeach

                                                              </select>
                                                          </div>
                                                      </div>
                                                      <button class="btn btn-primary" onclick="stepper1.previous().preventDefault()">Previous</button>
                                                      <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>

                                        </div> --}}



                                          {{-- <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                <label>Assign Subject</label>
                                                    <select class="duallistbox" multiple="multiple">
                                                        <option selected>Alabama</option>
                                                        <option>Alaska</option>
                                                        <option>California</option>
                                                        <option>Delaware</option>
                                                        <option>Tennessee</option>
                                                        <option>Texas</option>
                                                        <option>Washington</option>
                                                    </select>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                        </div> --}}

                                        {{-- <div class="card-body"> --}}

                                            {{-- <div class="row">
                                              <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Multiple</label>
                                                        <pre>
                                                            <select multiple="multiple" name="duallistbox_demo1[]" title="duallistbox_demo1[]">
                                                                <option value="1" selected>Alabama</option>
                                                                <option value="2">Alaska</option>
                                                                <option value="3">California</option>
                                                                <option value="4">Delaware</option>
                                                                <option value="5">Tennessee</option>
                                                                <option value="6">Texas</option>
                                                                <option value="7">Washington</option>
                                                            </select>
                                                        </pre>

                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                              <!-- /.col -->
                                            </div> --}}


                                            <!-- /.row -->
                                          {{-- </div> --}}
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
                        <button id="id" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- modal-TEST -->
    <div class="modal fade modal-top-lg" id="modal-TEST">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="demo_form" action="{{ route('student.save')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Student</h4>
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

                                    {{-- <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                              <div class="card card-default">
                                                <div class="card-header">
                                                  <h3 class="card-title">bs-stepper</h3>
                                                </div>
                                                <div class="card-body p-0">
                                                  <div class="bs-stepper">
                                                    <div class="bs-stepper-header" role="tablist">
                                                      <!-- your steps here -->
                                                      <div class="step" data-target="#logins-part">
                                                        <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                                          <span class="bs-stepper-circle">1</span>
                                                          <span class="bs-stepper-label">Logins</span>
                                                        </button>
                                                      </div>
                                                      <div class="line"></div>
                                                      <div class="step" data-target="#information-part">
                                                        <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                                          <span class="bs-stepper-circle">2</span>
                                                          <span class="bs-stepper-label">Various information</span>
                                                        </button>
                                                      </div>
                                                    </div>
                                                    <div class="bs-stepper-content">
                                                      <!-- your steps content here -->
                                                      <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                                        <div class="form-group">
                                                          <label for="exampleInputEmail1">Email address address </label>
                                                          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                                                        </div>
                                                        <div class="form-group">
                                                          <label for="exampleInputPassword1">Password</label>
                                                          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                                                        </div>
                                                        <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                                                      </div>
                                                      <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                                        <div class="form-group">
                                                          <label for="exampleInputFile">File input</label>
                                                          <div class="input-group">
                                                            <div class="custom-file">
                                                              <input type="file" class="custom-file-input" id="exampleInputFile" required>
                                                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                            </div>
                                                            <div class="input-group-append">
                                                              <span class="input-group-text">Upload</span>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer">
                                                  Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin.
                                                </div>
                                              </div>
                                              <!-- /.card -->
                                            </div>
                                          </div>

                                    </div> --}}

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

{{--
<section>

    <div class="container">
        <h1>bs-stepper</h1>
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                  <!-- your steps here -->
                  <div class="step" data-target="#student-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="student-part" id="student-part-trigger">
                      <span class="bs-stepper-circle">1</span>
                      <span class="bs-stepper-label">Student information</span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#information-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                      <span class="bs-stepper-circle">2</span>
                      <span class="bs-stepper-label">Other information</span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#subject-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="subject-part" id="subject-part-trigger">
                      <span class="bs-stepper-circle">3</span>
                      <span class="bs-stepper-label">Subject information</span>
                    </button>
                  </div>
                </div>

                <div class="bs-stepper-content">
                  <!-- your steps content here -->
                  <div id="student-part" class="content" role="tabpanel" aria-labelledby="student-part-trigger">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="admissionNumber">Admission Number/UPI</label>
                            <input name="admissionNumber" type="text" class="@error('admissionNumber')
                            is-invalid
                            @enderror form-control"
                                placeholder="Enter Admission Number">
                        </div>
                        <div class="form-group">
                            <label for="studentname">Student Name</label>
                            <input name="studentname" type="text" class="@error('studentname')
                            is-invalid
                            @enderror form-control"
                                placeholder="Enter Student Name">
                        </div>
                        <div class="form-group">
                            <label>Date of Birth:</label>
                            <div class="input-group date" id="dobdate"
                                data-target-input="nearest">
                                <input name="dateOfbirth" type="text" class="@error('dateOfbirth')
                                is-invalid
                                @enderror datetimepicker-input form-control"
                                    data-target="#dobdate" placeholder="yyyy-mm-dd">
                                <div class="input-group-append" data-target="#dobdate"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="@error('gender')
                            is-invalid
                            @enderror form-control">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                  </div>
                  <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Date of Enrollment:</label>
                            <div class="input-group date" id="enrollmentdate"
                                data-target-input="nearest">
                                <input name="dateOfEnrollment" type="text" class="@error('dateOfEnrollment')
                                is-invalid
                                @enderror datetimepicker-input form-control"
                                    data-target="#enrollmentdate" placeholder="yyyy-mm-dd">
                                <div class="input-group-append" data-target="#enrollmentdate"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Class</label>
                            <select name="class" class="@error('class')
                            is-invalid
                            @enderror form-control">

                            @foreach ($classes as $class)
                                <option value="{{$class->id}}">{{ $class->name}}</option>
                            @endforeach

                            </select>
                        </div>
                        <!-- Select -->
                        <div class="form-group">
                            <label>Stream</label>
                            <select name="stream" class="@error('stream')
                            is-invalid
                            @enderror form-control">
                            <option selected="selected">None</option>
                            @foreach ($streams as $stream)
                            <option value="{{$stream->id}}"> {{$stream->name}} </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Guardian/Parent</label>
                            <select name="parent" class="@error('parent') is-invalid
                            @enderror select2bs4" style="width: 100%;">
                                <option selected="selected">None</option>

                                @foreach ($guardians as $guardian)
                                <option value="{{$guardian->id}}">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>{{$guardian->name}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                    <button class="btn btn-primary" onclick="stepper.next()">Next</button>
                  </div>
                  <div id="subject-part" class="content" role="tabpanel" aria-labelledby="subject-part-trigger">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Assign Subject:</label>
                            <select name="subject[]" class="select2" multiple="multiple" data-placeholder="Any" style="width: 100%;">

                                @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
          </div>

        </div>
      </div>
</section> --}}


<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Students</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Admin No</th>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>DOE</th>
                            <th>Gender</th>
                            <th>Class</th>
                            <th>Stream</th>
                            <th>Parent</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($students as $student)
                        <tr>
                            <td style="width: 40px">{{ $student->adminno }}</td>
                            <td style="width: 140px">{{ $student->name }}</td>
                            <td style="width: 40px">{{ $student->dob }}</td>
                            <td style="width: 40px">{{ $student->enrollment }}</td>
                            <td style="width: 40px">{{ $student->gender }}</td>
                            <td style="width: 30px">{{ $student->classes->name}}</td>
                            @empty($student->stream->name)
                            <td style="text-align: center; width: 30px"><strong>__</strong></td>
                            @endempty
                            @foreach ($student->stream as $stream)
                            <td style="width: 30px">{{ $stream->name}}</td>
                            @endforeach
                            <td style="width: 140px">{{ $student->guardian->name }} </td>
                            <td style="width: 40px">
                                <a target="" class="btn-primary btn-xs space" href="/edit-student/{{$student->id}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn-danger btn-xs space" href="/delete-student/{{$student->id}}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>

                            </td>
                        </tr>
                        @endforeach --}}

                        @foreach ($streams as $stream)

                            @foreach ($stream->student as $student )
                                <tr>
                                    <td  style="width: 40px">{{ $student->adminno}}</>
                                    <td  style="width: 140px">{{ $student->name}}</td>
                                    <td  style="width: 40px">{{ $student->dob}}</td>
                                    <td  style="width: 40px">{{ $student->enrollment}}</td>
                                    <td  style="width: 40px">{{ $student->gender}}</td>
                                    <td  style="width: 30px">{{ $student->classes->name}}</td>
                                    <td  style="width: 30px">{{ $stream->name}}</td>
                                    <td  style="width: 140px">{{ $student->guardian->name}}</td>
                                    <td  style="width: 40px">
                                        <a target="" class="btn-primary btn-xs space" href="/edit-student/{{$student->id}}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="btn-danger btn-xs space" href="/delete-student/{{$student->id}}">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>

                            @endforeach
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Admin No</th>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>DOE</th>
                            <th>Gender</th>
                            <th>Class</th>
                            <th>Stream</th>
                            <th>Parent</th>
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
    $('#dobdate').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $('#enrollmentdate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    // $('#id').mouseover(function () {
    //     alert(this.id)
    // });

})



// // BS-Stepper Init
document.addEventListener('click', function () {

    window.stepper = new Stepper(document.querySelector('.bs-stepper'));
    $('#modal-student').modal('show')
    // this.preventDefault();
})
// $(document).ready(function (event) {

//   var stepper = new Stepper($('.bs-stepper')[0])
// event.preventDefault();
//   alert( event.isDefaultPrevented() ); // false
//   event.preventDefault();
//   alert( event.isDefaultPrevented() ); // true
// })

// var stepper1Node = document.querySelector('#stepper1')
// var stepper1 = new Stepper(document.querySelector('#stepper1'))


// stepper1Node.addEventListener('show.bs-stepper', function (event) {

//     // window.preventDefault();
// alert(console.warn('show.bs-stepper', event))
// this.preventDefault();
// // modal focus
// // $('#modal-student').on('shown.bs.modal', function () {
// // $('#myInput').trigger('focus')
// // })
// // alert('show.bs-stepper', event)
// console.warn('show.bs-stepper', event)
// })



</script>
@endpush


@endsection
