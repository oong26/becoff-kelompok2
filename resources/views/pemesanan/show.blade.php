@extends('layouts.template')
@section('content')
<h1 class="mt-4">Detail Pesanan</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">
        <a href="{{ route('dashboard') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('pemesanan.index') }}">List Pemesanan</a>
    </li>
    <li class="breadcrumb-item active">
        Detail
    </li>
</ol>
<div class="row">

    <div class="col-xl-12 col-lg-11">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Detail Pesanan</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 col-lg-11">
                        <div class="form-group">
                            <label for="kode_pesanan">Kode Pesanan</label>
                            <input type="number" name="kode_pesanan" id="kode_pesanan" class="form-control" value="{{ old('kode_pesanan', $pesanan->kode_pesanan) }}" readonly>
                        </div>
                        {{--  <div class="form-group">
                            <label for="pemesan">Pemesan</label>
                            <input type="text" name="pemesan" id="pemesan" class="form-control" value="{{ old('pemesan', $pesanan->nama_pemesan) }}" readonly>
                        </div>  --}}
                        <div class="form-group">
                            <label for="meja">Nomor Meja</label>
                            <input type="text" name="meja" id="meja" class="form-control" value="{{ old('meja', $pesanan->nomor_meja) }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="new_cust">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="5" readonly>{{ old('keterangan', $pesanan->keterangan) }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-11">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table-cart">
                                <tr>
                                    <th class="text-center">Menu</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Total</th>
                                </tr>
                                @forelse ($detail as $item)
                                <tr>
                                    <td class="text-center">
                                        <img class="img-fluid rounded" src="{{ asset($item->foto) }}" alt="Card image cap" width="160px" style="min-height: 140px;">
                                        <br>
                                        {{ $item->nama }}
                                        <br>
                                        Rp. <label>{{ number_format($item->harga, 2, ',', '.') }}</label>
                                    </td>
                                    <td class="text-center">
                                        <center>
                                            <input type="number" class="form-control" value="{{ $item->qty }}" min="0" style="width: 5em;" readonly>
                                        </center>
                                    </td>
                                    <td class="text-center">
                                        Rp. {{ number_format($item->total_harga, 2, ',', '.') }}
                                    </td>
                                </tr>
                                @empty
                                <p>Belum ada menu yang tersedia.</p>
                                @endforelse
                            <tr>
                                <th class="text-center" colspan="2">Total</th>
                                <th class="text-center">Rp. {{ number_format($pesanan->total, 2, ',', '.') }}</th>
                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection