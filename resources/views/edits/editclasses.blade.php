@extends('layouts.home')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Classes Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboardv1') }}">Home</a></li>
                    <li class="breadcrumb-item active">Classes Details</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->

    @if (Session::has('Classes_updated'))
    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                {{Session::get('Classes_updated')}}
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
                            <h3 class="card-title">Edit Classes</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{route('classes.update')}}" >
                            @csrf
                            <input type="hidden" name="id" value="{{$classes->id}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="classname">Class Name</label>
                                            <input name="classname" type="text" class="form-control"
                                                placeholder="Enter Class Name" value="{{$classes->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Cohort Session</label>
                                            <select name="cohortType" class="form-control">
                                            {{-- <option value="{{ $classes->cohortSession->id }}"> {{ $classes->cohortSession->name }}</option> --}}

                                            @foreach ($cohortsessions as $cohortsession)
                                                @if ($cohortsession->name == $classes->cohortSession->name)
                                                <option value="{{ $classes->cohortSession->id }}" selected>{{ $cohortsession->name }}</option>
                                                @else
                                                <option value="{{ $cohortsession->id }}">{{ $cohortsession->name }}</option>
                                                @endif
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Start Date</label>
                                            <div class="input-group date" id="startdate"
                                                data-target-input="nearest">
                                                <input name="startDate" type="text" class="datetimepicker-input form-control"
                                                    data-target="#startdate" placeholder="yyyy-mm-dd" value="{{$classes->start_date}}">
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
                                                <input name="endDate" type="text" class="datetimepicker-input form-control"
                                                    data-target="#enddate" placeholder="yyyy-mm-dd" value="{{$classes->end_date}}">
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
                                            <select name="modeOfStudy" class="form-control">
                                            {{-- <option value="{{ $classes->studyMode->id }}">{{ $classes->studyMode->name }}</option> --}}
                                            @foreach ($studymodes as $studymode)
                                                @if ($studymode->name == $classes->studyMode->name)
                                                <option value="{{$classes->studyMode->id }}" selected>{{ $studymode->name }}</option>
                                                @else
                                                <option value="{{ $studymode->id }}">{{ $studymode->name }}</option>
                                                @endif
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Stream</label>
                                            <select name="stream" class="form-control">
                                            @foreach ($streams as $stream)

                                                {{-- @foreach ( $classes->streamsMany as $classstream )
                                                <option value="{{ $classstream->id }}">{{ $classstream->name }}</option>

                                                    @if ($stream->name == $stream->name)
                                                    <option value="{{$stream->id }}" selected>{{ $classstream->name }}</option>
                                                    @else
                                                    <option value="{{ $stream->id }}">{{ $stream->name }}</option>
                                                    @endif
                                                @endforeach --}}
                                                @foreach ( $classes->streamsMany as $classstream )
                                                @if ($stream->name == $classstream->name)
                                                <option value="{{ $classstream->id }}" selected>{{ $classstream->name }}</option>
                                                @else
                                                    <option value="{{ $stream->id }}">{{ $stream->name }}</option>
                                                @endif

                                                @endforeach
                                                {{-- <option value="{{ $stream->id }}">{{ $stream->name }}</option> --}}

                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label for="notes">Notes</label>
                                                </div>
                                                <div class="col-sm-12">
                                                    <textarea name="notes" cols="68" rows="5">{{$classes->notes}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Class</button>
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
