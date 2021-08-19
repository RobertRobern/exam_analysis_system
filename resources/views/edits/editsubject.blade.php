@extends('layouts.home')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Subject Details (Edit)</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboardv1') }}">Home</a></li>
                    <li class="breadcrumb-item active">Subject Details (Edit)</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->

    @if (Session::has('Subject_updated'))
    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                {{Session::get('Subject_updated')}}
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
                            <h3 class="card-title">Edit Subject</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{route('subject.update')}}" >
                            @csrf
                            <input type="hidden" name="id" value="{{$subjects->id}}">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="subjectCode">Subject Code</label>
                                            <input name="subjectCode" type="text"  class=" form-control"
                                                placeholder="Enter Subject Code" value="{{$subjects->code}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="subjectName">Subject Name</label>
                                            <input name="subjectName" type="text" class="form-control"
                                                placeholder="Enter Subject Name" value=" {{$subjects->name}}">
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="subjectFamily">Subject Family</label>
                                            <input name="subjectFamily" type="text" class=" form-control"
                                                placeholder="Enter Subject Family" value=" {{$subjects->subjectFamily->id}}">
                                        </div> --}}
                                        <div class="form-group">
                                            <label>Subject Family</label>
                                            <select name="subjectFamily" class="form-control">
                                                @if ($subjects->subjectFamily->id == $subjects->subjectFamily->id)
                                                    <option value="{{ $subjects->subjectFamily->id }}">{{$subjects->subjectFamily->name}}</option>
                                                @else
                                                    <option value="{{ $subjects->subjectFamily->id}}">{{$subjects->subjectFamily->name}}</option>
                                                @endif
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update School</button>
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
