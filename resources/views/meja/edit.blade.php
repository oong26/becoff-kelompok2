@extends('layouts.template')
@section('content')
    <h1 class="mt-4">Edit Meja</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">
            <a href="{{ route('dashboard') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('meja.index') }}">Meja</a>
        </li>
        <li class="breadcrumb-item active">
            Edit
        </li>
    </ol>
    <div class="row">

        <div class="col-xl-12 col-lg-11">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Meja</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('meja.update', $data->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nomor">Nomor Meja</label>
                            <input type="text" name="nomor" id="nomor"
                                class="form-control @error('nomor') is-invalid @enderror"
                                value="{{ old('nomor', $data->nomor_meja) }}" required>
                            @error('nomor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" value="Submit" class="btn btn-success">
                        <input type="reset" value="Reset" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
