@extends('layouts.template')
@push('css')
<link href="{{ asset('assets/vendor/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" crossorigin="anonymous" />
@endpush
@section('content')
            <h1 class="mt-4">Rekapitulasi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    Rekapitulasi
                </li>
            </ol>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area mr-1"></i>
                            List Rekapitulasi
                        </div>
                        <div class="card-body">
                            <form class="mb-3" action="{{ route('rekapitulasi.index') }}" method="get">
                                <div class="row">
                                    @if(isset($_GET['dari']) && isset($_GET['sampai']))
                                    <div class="col-xl-3 col-lg-4 col-md-4">
                                        <label for="dari">Dari</label>
                                        <input type="date" class="form-control mb-2 mr-sm-2" id="dari" name="dari" value="{{ old('dari', $_GET['dari']) }}">    
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-4">
                                        <label for="sampai">Sampai</label>
                                        <input type="date" class="form-control mb-2 mr-sm-2" id="sampai" name="sampai" value="{{ old('sampai', $_GET['sampai']) }}">  
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-4">
                                        <br>
                                        <input type="submit" class="btn btn-primary mt-xl-2 mt-lg-2 mt-md-2" value="Submit">
                                    </div>
                                    @else
                                    <div class="col-xl-3 col-lg-4 col-md-4">
                                        <label for="dari">Dari</label>
                                        <input type="date" class="form-control mb-2 mr-sm-2" id="dari" name="dari" value="{{ old('dari') }}">    
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-4">
                                        <label for="sampai">Sampai</label>
                                        <input type="date" class="form-control mb-2 mr-sm-2" id="sampai" name="sampai" value="{{ old('sampai') }}">  
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-4">
                                        <br>
                                        <input type="submit" class="btn btn-primary mt-xl-2 mt-lg-2 mt-md-2" value="Submit">
                                    </div>
                                    @endif
                                </div>
                            </form>
                            @if(isset($_GET['dari']) && isset($_GET['sampai']))
                            <p>Data dari tanggal {{ $_GET['dari'] }} sampai {{ $_GET['sampai'] }}.</p>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    @php
                                        $totalPemasukan = 0;
                                        $totalPengeluaran = 0;
                                    @endphp
                                    <thead>
                                        <tr>
                                          <th class="text-center">#</th>
                                          <th class="text-center">Tanggal</th>
                                          <th class="text-center">Keterangan</th>
                                          <th class="text-center">Pemasukan</th>
                                          <th class="text-center">Pengeluaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rekap as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ substr($item->updated_at, 0, 10) }}</td>
                                            <td class="text-center">{{ $item->keterangan }}</td>
                                            <td class="text-center">
                                                @if($item->tipe == 'Pemasukan')
                                                    Rp. {{ number_format($item->nominal, 2, ',', '.') }}
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($item->tipe == 'Pengeluaran')
                                                    Rp. {{ number_format($item->nominal, 2, ',', '.') }}
                                                @else
                                                -
                                                @endif
                                            </td>
                                        </tr>
                                        @php
                                        if($item->tipe == 'Pemasukan') {
                                            $totalPemasukan += $item->nominal;
                                        }
                                        else {
                                            $totalPengeluaran += $item->nominal;
                                        }
                                        @endphp
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                          <th class="text-center" colspan="3">Total</th>
                                          <th class="text-center">Rp. {{ number_format($totalPemasukan, 2, ',', '.') }}</th>
                                          <th class="text-center">Rp. {{ number_format($totalPengeluaran, 2, ',', '.') }}</th>
                                        </tr>
                                        <tr>
                                          <th class="text-center" colspan="3">Laba rugi</th>
                                          <th class="text-center" colspan="2">Rp. {{ number_format($totalPemasukan-$totalPengeluaran, 2, ',', '.') }}</th>
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