@extends('layouts.template')
@push('css')
<link href="{{ asset('assets/vendor/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" crossorigin="anonymous" />
@endpush
@section('content')
            <h1 class="mt-4">Daftar Menu</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    Daftar Menu
                </li>
            </ol>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area mr-1"></i>
                            List Daftar Menu
                            <a href="{{ route('daftar-menu.create') }}" class="ml-4 d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                          <th class="text-center">#</th>
                                          <th class="text-center">Nama</th>
                                          <th class="text-center">Keterangan</th>
                                          <th class="text-center">Harga</th>
                                          <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($daftarMenu as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset($item->foto) }}" alt="{{$item->nama}}" class="rounded img-fluid" width="200px" height="200px">
                                                {{ $item->nama }}
                                            </td>
                                            <td class="text-center">{{ isset($item->keterangan) ? $item->keterangan : '-' }}</td>
                                            <td class="text-right">Rp. {{ number_format($item->harga, 2, ',', '.') }}</td>
                                            <td class="align-middle">
                                                <center>
                                                    <a href="{{route('daftar-menu.edit', $item->id)}}">
                                                        <button type="submit" class="btn btn-sm btn-info btn-circle">
                                                            <i class="fas fa-pen"></i>
                                                        </button>
                                                    </a>|
                                                    <form action="{{route('daftar-menu.destroy', $item->id)}}" method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger btn-circle" onclick="return confirm('Hapus Data ?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </center>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push('js')
<!-- Page level plugins -->
<script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('assets/vendor/datatables/js/dataTables.bootstrap4.min.js') }}" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
  
</script>
@endpush