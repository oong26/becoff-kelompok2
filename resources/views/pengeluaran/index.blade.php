@extends('layouts.template')
@push('css')
<link href="{{ asset('assets/vendor/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" crossorigin="anonymous" />
@endpush
@section('content')
            <h1 class="mt-4">Pengeluaran</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    Pengeluaran
                </li>
            </ol>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area mr-1"></i>
                            List Pengeluaran
                            <a href="{{ route('pengeluaran.create') }}" class="ml-4 d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    @php
                                        $total = 0;
                                    @endphp
                                    <thead>
                                        <tr>
                                          <th class="text-center">#</th>
                                          <th class="text-center">Tanggal</th>
                                          <th class="text-center">Keterangan</th>
                                          <th class="text-center">Bukti</th>
                                          <th class="text-center">Nominal</th>
                                          <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengeluaran as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ substr($item->created_at, 0, 10) }}</td>
                                            <td class="text-center">{{ $item->keterangan }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset($item->bukti) }}" width="200" height="200">
                                            </td>
                                            <td class="text-center">Rp. {{ number_format($item->nominal, 2, ',', '.') }}</td>
                                            <td class="align-middle">
                                                <center>
                                                    <a href="{{route('pengeluaran.edit', $item->id)}}">
                                                        <button type="submit" class="btn btn-sm btn-info btn-circle">
                                                            <i class="fas fa-pen"></i>
                                                        </button>
                                                    </a>
                                                </center>
                                            </td>
                                        </tr>
                                        @php
                                            $total += $item->nominal;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                          <th class="text-center" colspan="4">Total</th>
                                          <th class="text-center">Rp. {{ number_format($total, 2, ',', '.') }}</th>
                                          <th></th>
                                        </tr>
                                    </tfoot>
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