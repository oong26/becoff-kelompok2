<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pesanan->kode_pesanan }}</title>
</head>
<body>
    <center>
        <h1>Becoff</h1>
        <hr>
        <br>
        <table>
            <tr>
                <td>Kode Pesanan</td>
                <td>:</td>
                <td>{{ $pesanan->kode_pesanan }}</td>
                <td></td>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $pesanan->nama_pemesan }}</td>
            </tr>
            <tr>
                <td>Meja</td>
                <td>:</td>
                <td>{{ $pesanan->nomor_meja }}</td>
                <td></td>
                <td>Keterangan</td>
                <td>:</td>
                <td>{{ isset($pesanan->keterangan) ? $pesanan->keterangan : '-' }}</td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>:</td>
                <td>{{ $pesanan->updated_at }}</td>
            </tr>
        </table>
        <br>
        <table width="100%" border="1px solid black">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Menu</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail as $item)
                <tr>
                    <td>
                        <center>
                            {{ $loop->iteration }}
                        </center>
                    </td>
                    <td>
                        <center>{{ $item->nama }}</center>
                    </td>
                    <td>
                        <center>{{ $item->qty }}</center>
                    </td>
                    <td>
                        <center>Rp. {{ number_format($item->harga, 2, ',', '.') }}</center>
                    </td>
                    <td>
                        <center>Rp. {{ number_format($item->total_harga, 2, ',', '.') }}</center>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <thead>
                <th colspan="4">Total</th>
                <th>Rp. {{ number_format($pesanan->total, 2, ',', '.') }}</th>
            </thead>
        </table>
    </center>
</body>
<script type="text/javascript">
    window.print();
</script>
</html>