@extends('layouts.home')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>School Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboardv1') }}">Home</a></li>
                    <li class="breadcrumb-item active">School Details</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Modal -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-school">
                            School
                        </button>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- ./row -->
    </div><!-- /.container-fluid -->

    @if (Session::has('School_saved'))
    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                {{Session::get('School_saved')}}
            </div>
        </div>
    </section>
    @endif

    @if (Session::has('School_deleted'))
    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-success">
                {{Session::get('School_deleted')}}
            </div>
        </div>
    </section>
    @endif

    @if (Session::has('School_updated'))
    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                {{Session::get('School_updated')}}
            </div>
        </div>
    </section>
    @endif

    
    <!-- modal-school -->
    <div class="modal fade modal-top-lg" id="modal-school">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <form method="POST" action="{{ route('school.save') }}">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Add New School</h4>
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
                                                    <label for="schoolname">School Name</label>
                                                    <input type="text" name="name" class="@error('school_name') is-invalid @enderror form-control"
                                                        placeholder="Enter School Name" value="{{ old('school_name') }}">
                                                </div>
                                                @error('school_name')
                                                    <div class="alert alert-danger mt-1 mb-1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label for="countyname">County Name</label>
                                                    <input type="text" name="county" class="@error('county') is-invalid @enderror form-control"
                                                        placeholder="Enter County Name">
                                                </div>
                                                @error('county')
                                                    <div class="alert alert-danger mt-1 mb-1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label for="subcountyname">Sub-County Name</label>
                                                    <input type="text" name="subcounty" class="@error('subcounty') is-invalid @enderror form-control"
                                                        placeholder="Enter Sub-County Name">
                                                </div>
                                                @error('subcounty')
                                                    <div class="alert alert-danger mt-1 mb-1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label for="postaladdress">Postal Address</label>
                                                    <input type="text" name="postal_address" class="@error('postal_address') is-invalid @enderror form-control"
                                                        placeholder="Enter Postal Address">
                                                </div>
                                                @error('postal_address')
                                                    <div class="alert alert-danger mt-1 mb-1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="postalcode">Postal Code</label>
                                                    <input type="text" name="postal_code" class="@error('postal_code') is-invalid @enderror form-control"
                                                        placeholder="Enter Postal Code">
                                                </div>
                                                @error('postal_code')
                                                    <div class="alert alert-danger mt-1 mb-1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label for="telnumber">Telephone Number</label>
                                                    <input type="text" name="tel_number" class="@error('tel_number') is-invalid @enderror form-control"
                                                        data-inputmask="&quot;mask&quot;: &quot;(+999) 99999-9999&quot;"
                                                        data-mask="" inputmode="text">
                                                </div>
                                                @error('tel_number')
                                                    <div class="alert alert-danger mt-1 mb-1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label for="emailaddress">Email Address</label>
                                                    <input type="email" name="email" class="@error('email') is-invalid @enderror form-control"
                                                        id="emailaddress" placeholder="Enter Email Address">
                                                </div>
                                                @error('email')
                                                    <div class="alert alert-danger mt-1 mb-1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
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
                <h3 class="card-title">School Records</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th># No</th>
                            <th>School Name</th>
                            <th>County Name</th>
                            <th>Sub-County Name</th>
                            <th>Postal Address</th>
                            <th>Postal Code</th>
                            <th>Tel Number</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($schools as $school)
                        <tr>

                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $school->name }}</td>
                            <td>{{ $school->county }}</td>
                            <td>{{ $school->subcounty }}</td>
                            <td>{{ $school->postal_address }}</td>
                            <td>{{ $school->postal_code }}</td>
                            <td>{{ $school->tel_number }}</td>
                            <td>{{ $school->email }}</td>
                            <td>
                                <a target="" class="btn-primary btn-xs space" href="/edit-school/{{$school->id}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- <a data-target="#modal-schoolupdate"  data-toggle="modal"  class="btn-primary btn-xs space" href="" data-id="{{ $school->id }}">
                                    <i class="fas fa-edit"></i>
                                </a> -->

                                <a class="btn-danger btn-xs space" href="/delete-school/{{$school->id}}">
                                    {{-- <i class="fas fa-trash-alt"></i> --}}
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th># No</th>
                            <th>School Name</th>
                            <th>County Name</th>
                            <th>Sub-County Name</th>
                            <th>Postal Address</th>
                            <th>Postal Code</th>
                            <th>Tel Number</th>
                            <th>Email</th>
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
@push('script')
<script>
function myToast() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-center',
        showConfirmButton: false,
        timer: 10000

    });

    Toast.fire({
        icon: 'success',
        title: 'School saved successfully'
    })
}
</script>

@endpush
