@extends('layouts.template')
@section('content')
            <h1 class="mt-4">Edit Menu</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                  <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="{{ route('daftar-menu.index') }}">Daftar Menu</a>
                </li>
                <li class="breadcrumb-item active">
                  Edit
                </li>
            </ol>
            <div class="row">

                <div class="col-xl-12 col-lg-11">
                    <div class="card shadow mb-4">
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Menu</h6>
                      </div>
                      <!-- Card Body -->
                      <div class="card-body">
                        <form action="{{ route('daftar-menu.update', $menu->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama">Nama Menu</label>
                                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $menu->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control @error('keterangan') is-invalid @enderror">
                                  {{ old('keterangan', $menu->keterangan) }}
                                </textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga (Rp)</label>
                                <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $menu->harga) }}">
                                @error('harga')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                              <label for="foto">Foto</label>
                              @if ($menu->foto != null)
                                <br><img src="{{ asset($menu->foto) }}" alt="{{ $menu->nama }}" class="rounded img-fluid" width="200px" height="200px"><br><br>
                              @endif
                              <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror" value="{{ old('foto') }}">
                              @error('foto')
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