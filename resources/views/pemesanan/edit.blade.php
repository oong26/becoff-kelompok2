@extends('layouts.template')
@section('content')
<h1 class="mt-4">Tambah Pesanan</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">
        <a href="{{ route('dashboard') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('pemesanan.index') }}">List Pemesanan</a>
    </li>
    <li class="breadcrumb-item active">
        Tambah
    </li>
</ol>
<div class="row">

    <div class="col-xl-12 col-lg-11">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Pesanan</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
            <form action="{{ route('pemesanan.update', $pesanan->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xl-12 col-lg-11">
                      {{--  {{ $detail[0]->total_harga }}  --}}
                        <div class="table-responsive">
                            <table id="menu" class="table table-bordered" id="table-cart">
                                <thead>
                                    <tr>
                                        <th>Menu</th>
                                        <th>QTY</th>
                                        <th>Harga</th>
                                        <th align="center"><span id="amount" class="amount">Subtotal</span> </th>
                                    </tr>
                                </thead>
                                @php
                                  $index = 0;
                                  $initTotal = 0;
                                  $isFirstLoad = true;
                                  $endIndexDetail = count($detail) - 1;
                                @endphp
                                @forelse ($daftarMenu as $item)
                                <tbody>
                                    <tr>
                                        <td>
                                            <img class="img-fluid rounded" src="{{ asset($item->foto) }}" alt="Card image cap" width="160px" style="min-height: 140px;"><br>
                                            <input type="hidden" name="menu[]" value="{{ $item->id }}">
                                            <strong>
                                                {{ $item->nama }}
                                            </strong>
                                        </td>
                                        <td>
                                            @if ($item->id == $detail[$index]->id_menu)
                                            @php
                                                $initTotal += $detail[$index]->total_harga;
                                            @endphp
                                            <input type="text" value="{{ $detail[$index]->qty }}" name="qty[]" class="qty form-control" >
                                            @else
                                            <input type="text" value="" name="qty[]" class="qty form-control" >
                                            @endif
                                        </td>
                                        <td>
                                            <input type="hidden" name="price[]" value="{{ $item->harga }}">
                                            <input type="text" value="{{ $item->harga }}" name="prices[]" class="price form-control" disabled="true">
                                        </td>
                                        <td align="center">
                                            <strong id="amount" class="amount">Rp. 0</strong>
                                        </td>
                                    </tr>
                                    @php
                                        if ($item->id == $detail[$index]->id_menu)
                                            if($index < $endIndexDetail)
                                            $index++;
                                        //if($loop->iteration < count($detail)) {
                                        //    if ($item->id == $detail[$index]->id_menu)
                                        //        $index++;
                                        //}
                                        //else {
                                        //    if ($item->id == $detail[$index]->id_menu)
                                        //        $index++;
                                        //}
                                    @endphp
                                    @empty
                                    <p>Belum ada menu yang tersedia.</p>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center" colspan="3">Total</th>
                                        <th class="text-center">Rp. <label id="total" class="total"> 0</label></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xl-12 col-lg-11">
                        <div class="form-group">
                            <label for="kode_pesanan">Kode Pesanan</label>
                            <input type="number" name="kode_pesanan" id="kode_pesanan" class="form-control @error('kode_pesanan') is-invalid @enderror" value="{{ old('kode_pesanan', $pesanan->kode_pesanan) }}" readonly>
                            @error('kode_pesanan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{--  <div class="form-group">
                            <label for="cust">Pelanggan</label>
                            <select name="cust" id="cust" class="form-control @error('kode_pesanan') is-invalid @enderror">
                                <option value="0">--Pilih Pelanggan--</option>
                                @foreach ($customer as $item)
                                    <option value="{{ old('cust', $item->id) }}" {{ $item->id == $pesanan->pemesan ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('kode_pesanan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>  --}}
                        <div class="form-group">
                            <label for="nama_pemesan">Nama Pemesan</label>
                            <input type="text" name="nama_pemesan" id="nama_pemesan" class="form-control @error('nama_pemesan') is-invalid @enderror" value="{{ old('nama_pemesan', $pesanan->nama_pemesan) }}">
                            @error('nama_pemesan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="meja">Nomor Meja</label>
                            <input type="number" name="meja" id="meja" class="form-control @error('meja') is-invalid @enderror" value="{{ old('meja', $pesanan->nomor_meja) }}">
                            @error('meja')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_cust">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" cols="30" rows="5">{{ old('keterangan', $pesanan->keterangan) }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" value="Submit" class="btn btn-success">
                        <input type="reset" value="Reset" class="btn btn-danger">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    function resetNumberFormat(number) {
        number = number.split(',');
        {{--  number = number[0].replace('.', '');  --}}
        var result = number[0].replace('.', '');
        return result;
    }

    function number_format(number, decimals, dec_point, thousands_sep) {
        number = number.toFixed(decimals);

        var nstr = number.toString();
        nstr += '';
        x = nstr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? dec_point + x[1] : '';
        var rgx = /(\d+)(\d{3})/;

        while (rgx.test(x1))
            x1 = x1.replace(rgx, '$1' + thousands_sep + '$2');

        return x1 + x2;
    }
</script>
<script>
    var isFirstLoad = true;
    $(document).ready(function(){
        total();
        $('.qty').change(function() {
            total();
            console.log('qty change');
        });
        $('.amount').change(function() {
            total();
            console.log('amount change');
        });
    });

    function total()
    {
        console.log(isFirstLoad);
        var sum = 0;
        var init_total = {{ $initTotal }};
        // if(init_total != null) {
        //     sum = init_total;
        //     console.log('init total = '+init_total);
        //     $('.total').text(init_total);
        // }
        $('#menu > tbody  > tr').each(function() {
            console.log('each');
            var qty = $(this).find('.qty').val();
            var price = $(this).find('.price').val();
            var amount = (qty*price)
            var	number_string = amount.toString(),
            sisa 	= number_string.length % 3,
            rupiah 	= number_string.substr(0, sisa),
            ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
            
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            sum+=amount;
            var totalBiaya = sum;

            // console.log(totalBiaya);
            $(this).find('.amount').text(''+rupiah);
        });
        sum = number_format(sum, 2, ',', '.');
        $('.total').text(sum);
    }
</script>
@endpush