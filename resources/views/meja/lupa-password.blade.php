@extends('layouts.template')
@section('content')
            <h1 class="mt-4">Lupa Password</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    Lupa Password
                </li>
            </ol>
            <div class="row">

                <div class="col-xl-12 col-lg-11">
                    <div class="card shadow mb-4">
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Lupa Password</h6>
                      </div>
                      <!-- Card Body -->
                      <div class="card-body">
                        <form action="{{ route('lupa-password.change') }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{--  <div class="form-group">
                                <label for="old_password">Password lama</label>
                                <input type="password" name="old_password" id="old_password" class="form-control @error('old_password') is-invalid @enderror">
                                @error('old_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>  --}}
                            <div class="form-group">
                                <label for="new_password">Password baru</label>
                                <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror">
                                @error('new_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="conf_password">Konfirmasi password baru</label>
                                <input type="password" name="conf_password" id="conf_password" class="form-control @error('conf_password') is-invalid @enderror">
                                @error('conf_password')
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