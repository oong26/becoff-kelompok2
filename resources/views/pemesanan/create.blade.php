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
                    <form action="{{ route('pemesanan.store') }}" method="post">
                        @csrf
                        {{-- <div class="row mb-4">
                    <div class="col-xl-6">
                        <div class="row">
                            @forelse ($daftarMenu as $item)
                            <div class="card mr-2 mb-2" style="width: 12rem;">
                                <img class="card-img-top" src="{{ asset($item->foto) }}" alt="Card image cap">
                                <div class="card-body">
                                    {{ ucwords($item->nama) }} <br>
                                    Rp. {{ number_format($item->harga, 2, ',', '.') }}
                                </div>
                                <button type="button" name="add_cart" class="btn btn-primary add_cart" data-productname="{{ $item->nama }}" data-productprice="{{ $item->harga }}" data-productid="{{ $item->id }}" />Pilih</button>
                            </div>
                            @empty
                                <p>Belum ada menu yang tersedia.</p>
                            @endforelse
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table-cart">
                                <tr>
                                    <th class="text-center">Menu</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <hr> --}}
                        <div class="row">
                            <div class="col-xl-12 col-lg-11">
                                <div class="table-responsive">
                                    <table id="menu" class="table table-bordered" id="table-cart">
                                        <thead>
                                            <tr>
                                                <th>Menu</th>
                                                <th>QTY</th>
                                                <th>Harga</th>
                                                <th align="center"><span id="amount" class="amount">Subtotal</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            {{-- <tr><td colspan="2"></td> --}}
                                            <tr>
                                                <td class="text-center" colspan="3">Total</td>
                                                <td class="text-center">Rp.<label id="total" class="total">
                                                        0</label></td>
                                            </tr>
                                            {{-- <td align="right">
                                            <h3><span id="total" class="total text-success">Grand Total</span></h3>
                                        </td>
                                    </tr> --}}
                                        </tfoot>
                                        <tbody>
                                            @forelse ($daftarMenu as $item)
                                                <tr>
                                                    <td>
                                                        <img class="img-fluid rounded" src="{{ asset($item->foto) }}"
                                                            alt="Card image cap" width="160px"
                                                            style="min-height: 140px;"><br>
                                                        <input type="hidden" name="menu[]" value="{{ $item->id }}">
                                                        <strong>
                                                            {{ $item->nama }}
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        <input type="text" value="" name="qty[]" class="qty form-control">
                                                        @error('qty')
                                                            <p>{{ $message }}</p>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="price[]" value="{{ $item->harga }}">
                                                        <input type="text" value="{{ $item->harga }}" name="prices[]"
                                                            class="price form-control" disabled="true">
                                                    </td>
                                                    <td align="center">
                                                        <strong id="amount" class="amount">Rp. 0</strong>
                                                    </td>
                                                </tr>

                                            @empty
                                                <p>Belum ada menu yang tersedia.</p>
                                            @endforelse

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-12 col-lg-11">
                                <div class="form-group">
                                    <label for="kode_pesanan">Kode Pesanan</label>
                                    <input type="number" name="kode_pesanan" id="kode_pesanan"
                                        class="form-control @error('kode_pesanan') is-invalid @enderror"
                                        value="{{ old('kode_pesanan', $kodePesanan) }}" readonly>
                                    @error('kode_pesanan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                            <label for="nama_pemesan">Nama Pemesan</label>
                            <input type="text" name="nama_pemesan" id="nama_pemesan" class="form-control @error('nama_pemesan') is-invalid @enderror" value="{{ old('nama_pemesan') }}">
                            @error('nama_pemesan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                                {{-- @if (auth()->user()->role == 'Pegawai')
                        <div class="form-group">
                            <label for="old_cust">Pelanggan Lama</label>
                            <select name="old_cust" id="old_cust" class="form-control @error('kode_pesanan') is-invalid @enderror">
                                <option value="0">--Pilih Pelanggan--</option>
                                @foreach ($customer as $item)
                                    <option value="{{ old('old_cust', $item->id) }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('kode_pesanan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_cust">Pelanggan Baru</label>
                            <input type="text" name="new_cust" id="new_cust" class="form-control @error('new_cust') is-invalid @enderror" value="{{ old('new_cust') }}">
                            @error('new_cust')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @endif --}}
                                <div class="form-group">
                                    <label for="meja">Nomor Meja <small class="text-danger">*</small> </label>
                                    {{-- <input type="number" name="meja" id="meja"
                                        class="form-control @error('meja') is-invalid @enderror"
                                        value="{{ old('meja') }}"> --}}
                                    <select name="meja" id="meja" class="form-control @error('meja') is-invalid @enderror">
                                        <option value="0">Pilih Meja</option>
                                        @foreach ($meja as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('meja') == $item->id ? 'selected' : '' }}>
                                                {{ $item->nomor_meja }}</option>
                                        @endforeach
                                    </select>
                                    @error('meja')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="new_cust">Keterangan <small>Optional</small> </label>
                                    <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" cols="30"
                                        rows="5">{{ old('keterangan') }}</textarea>
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
            {{-- number = number[0].replace('.', ''); --}}
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
        $(document).ready(function() {
            total();
            $('.qty').change(function() {
                total();
            });
            $('.amount').change(function() {
                total();
            });
        });

        function total() {
            var sum = 0;
            $('#menu > tbody  > tr').each(function() {
                var qty = $(this).find('.qty').val();
                var price = $(this).find('.price').val();
                var amount = (qty * price)
                var number_string = amount.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                sum += amount;
                var totalBiaya = sum;

                // console.log(totalBiaya);
                $(this).find('.amount').text('' + rupiah);
            });
            sum = number_format(sum, 2, ',', '.');
            $('.total').text(sum);
        }
    </script>
@endpush
