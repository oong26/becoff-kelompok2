@extends('layouts.template')
@push('css')
<link href="{{ asset('assets/vendor/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" crossorigin="anonymous" />
@endpush
@section('content')
<h1 class="mt-4">Cek Kualitas</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">
        <a href="{{ route('dashboard') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">
        Cek Kualitas
    </li>
</ol>
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-check mr-1"></i>
                Hasil Cek Kualitas
            </div>
            <div class="card-body">
                <p>Selamat telah berhasil melakukan cek kualitas.</p>
                <p>Jenis Kopi : {{ $jenis_kopi }}</p>
                <p>Score : {{ $score }}</p>
                <a href="{{ route('cek-kualitas.index') }}" class="btn btn-info">Lihat Semua Data</a>
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