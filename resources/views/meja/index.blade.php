@extends('layouts.template')
@push('css')
    <link href="{{ asset('assets/vendor/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        crossorigin="anonymous" />
@endpush
@section('content')
    <h1 class="mt-4">Meja</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">
            <a href="{{ route('dashboard') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            Meja
        </li>
    </ol>
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area mr-1"></i>
                    List Meja
                    @if (auth()->user()->role == 'Owner')
                        <a href="{{ route('meja.create') }}"
                            class="ml-4 d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nomor Meja</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $item->nomor_meja }}</td>
                                        <td class="text-center">{{ $item->is_used ? 'Digunakan' : 'Tersedia' }}</td>
                                        <td class="align-middle">
                                            <div class="d-flex justify-content-center">
                                                @if (auth()->user()->role == 'Owner')
                                                    <form action="{{ route('meja.destroy', $item->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger btn-circle"
                                                            onclick="return confirm('Anda yakin akan menghapus data ini?')">
                                                            <i class="fas fa-window-close"></i>
                                                        </button>
                                                    </form>
                                                    &nbsp;
                                                    <a href="{{ route('meja.edit', $item->id) }}">
                                                        <button type="submit" class="btn btn-sm btn-info btn-circle">
                                                            <i class="fas fa-pen"></i>
                                                        </button>
                                                    </a>
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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
    <script src="{{ asset('assets/vendor/datatables/js/dataTables.bootstrap4.min.js') }}" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endpush
