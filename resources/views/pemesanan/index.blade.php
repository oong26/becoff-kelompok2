@extends('layouts.template')
@push('css')
<link href="{{ asset('assets/vendor/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" crossorigin="anonymous" />
@endpush
@section('content')
<h1 class="mt-4">Pemesanan</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">
        <a href="{{ route('dashboard') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        Pemesanan
    </li>
</ol>
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area mr-1"></i>
                List Pemesanan
                {{--  @if (auth()->user()->role == 'Customer')  --}}
                <a href="{{ route('pemesanan.create') }}" class="ml-4 d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                </a>
                {{--  @endif  --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Kode Pesanan</th>
                                {{--  <th class="text-center">Nama Pemesan</th>  --}}
                                <th class="text-center">Nomor Meja</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Waktu</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanan as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->kode_pesanan }}</td>
                                {{--  <td class="text-center">{{ $item->nama_pemesan }}</td>  --}}
                                <td class="text-center">{{ $item->nomor_meja }}</td>
                                <td class="text-center">{{ isset($item->keterangan) ? $item->keterangan : '-' }}</td>
                                <td class="text-center">
                                    @if (!isset($item->cancelled_at))
                                    {{ $item->created_at }}
                                    @else
                                    {{ $item->cancelled_at }}
                                    @endif
                                </td>
                                <td class="text-right">{{ number_format($item->total, 2, ',', '.') }}</td>
                                <td class="text-center">
                                    @if (!isset($item->cancelled_at))
                                    {{ $item->status }}
                                    @else
                                    Pesanan dibatalkan
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <center>
                                        @if ($item->status == 'Belum Diproses' && !isset($item->cancelled_at) && auth()->user()->role == 'Pegawai')
                                        <form action="{{route('pemesanan.konfirmasi', $item->id)}}" method="get" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-primary btn-circle" onclick="return confirm('Konfirmasi Pemesanan ?')">
                                                <i class="fas fa-dollar-sign"></i>
                                            </button>
                                        </form>
                                        @endif
                                        <a href="{{route('pemesanan.show', $item->id)}}">
                                            <button type="submit" class="btn btn-sm btn-success btn-circle">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </a>
                                        @if ($item->status == 'Belum Diproses' && auth()->user()->role == 'Customer' && !isset($item->cancelled_at))
                                        <a href="{{route('pemesanan.edit', $item->id)}}">
                                            <button type="submit" class="btn btn-sm btn-info btn-circle">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                        </a>
                                        <form action="{{route('pemesanan.cancel', $item->id)}}" method="get" class="d-inline">
                                            <button type="submit" class="btn btn-sm btn-danger btn-circle" onclick="return confirm('Batalkan pesanan ?')">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                        </form>
                                        @endif
                                        @if ($item->status == 'Sudah Diproses' && !isset($item->cancelled_at) && auth()->user()->role == 'Pegawai')
                                        <form action="{{route('pemesanan.print', $item->id)}}" method="get" target="_blank" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-primary btn-circle" onclick="return confirm('Print Nota ?')">
                                                <i class="fas fa-print"></i>
                                            </button>
                                        </form>
                                        @endif
                                        {{--  <form action="{{route('pemesanan.destroy', $item->id)}}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger btn-circle" onclick="return confirm('Hapus Data ?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>  --}}
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