<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Barcode</title>
    <style>
        .text-center {
            text-align: center;
            justify-content: center;
        }
        .barcode {
            margin: 10px;
            padding: 10px;
            border: 1px solid black;
            text-align: center;
            display: inline-block;
            vertical-align: top;
            width: 33%;
        }
        .barcode img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    @foreach ($dataproduk as $key => $produk)
    <div class="barcode">
        <p>{{ $produk->nama_produk }} - Rp. {{ format_uang($produk->harga_jual) }}</p>
        {!! DNS1D::getBarcodeHTML($produk->kode_produk, "C128",2,100) !!}
        <br>
        {{ $produk->kode_produk }}
    </div>
    @if(($key+1) % 3 == 0)
        <div style="clear:both;"></div>
    @endif
@endforeach
</body>
</html>
