@extends('layouts.home')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Study Mode</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboardv1') }}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Study Mode</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->

    @if (Session::has('StudyMode_updated'))
    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                {{Session::get('StudyMode_updated')}}
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
                            <h3 class="card-title">Edit Study Mode</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{route('studymode.update')}}" id="quickForm">
                            @csrf
                            <input type="hidden" name="id" value="{{ $studymodes->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="studyMode">Study Mode Name</label>
                                    <input name="studyMode" type="text" class="form-control" placeholder="Enter Study Mode Name" value="{{ $studymodes->name }}">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Study Mode</button>
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
