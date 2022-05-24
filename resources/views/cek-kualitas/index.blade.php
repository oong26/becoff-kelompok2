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
                <i class="fas fa-chart-area mr-1"></i>
                List Cek Kualitas
                <a href="{{ route('cek-kualitas.create') }}" class="ml-4 d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nomor Identitas</th>
                                <th class="text-center">Jenis Kopi</th>
                                <th class="text-center">Fragrance/Aroma</th>
                                <th class="text-center">Flavor / Rasa</th>
                                <th class="text-center">After Taste</th>
                                <th class="text-center">Acidity</th>
                                <th class="text-center">Body / Kekentalan</th>
                                <th class="text-center">Bitterness / Kepahitan</th>
                                <th class="text-center">Fruty / Winey</th>
                                <th class="text-center">Green / Grassy</th>
                                <th class="text-center">Smokey</th>
                                <th class="text-center">Cereal</th>
                                <th class="text-center">Chemical / Medicine</th>
                                <th class="text-center">Stinkey</th>
                                <th class="text-center">Earthy / Mouldy / Musty</th>
                                <th class="text-center">Score</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-right">{{ $item->nomor_identitas }}</td>
                                <td class="text-right">{{ $item->jenis_kopi }}</td>
                                <td class="text-right">{{ $item->aroma }}</td>
                                <td class="text-right">{{ $item->rasa }}</td>
                                <td class="text-right">{{ $item->after_taste }}</td>
                                <td class="text-right">{{ $item->acidity }}</td>
                                <td class="text-right">{{ $item->kekentalan }}</td>
                                <td class="text-right">{{ $item->kepahitan }}</td>
                                <td class="text-right">{{ $item->winey }}</td>
                                <td class="text-right">{{ $item->grassy }}</td>
                                <td class="text-right">{{ $item->smokey }}</td>
                                <td class="text-right">{{ $item->cereal }}</td>
                                <td class="text-right">{{ $item->medicine }}</td>
                                <td class="text-right">{{ $item->stinkey }}</td>
                                <td class="text-right">{{ $item->musty }}</td>
                                <td class="text-right">{{ $item->score }}</td>
                                <td class="align-middle">
                                    <center>
                                        <form action="{{route('cek-kualitas.destroy', $item->id)}}" method="POST" class="d-inline">
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