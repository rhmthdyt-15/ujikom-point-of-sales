<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Kartu Member</title>
</head>

<body>
    <section style="border: 1px solid #fff">
        <table width="100%">
            @foreach ($datamember as $key => $data )
            <tr>
                @foreach ($data as $member)
                <td class="text-center" width="50%">
                    <div class="box">
                        <img src="{{ asset('/public/templates/images/member.png') }}" alt="card">
                        <div class="logo">
                            <p>{{ config('app.name') }}</p>
                            <img src="{{ asset('/public/templates/images/logo3.png') }}" alt="logo">
                        </div>
                        <div class="nama">
                            {{ $member->nama }}
                        </div>
                        <div class="telepon">
                            {{ $member->telepon }}
                        </div>
                        <div class="barcode text-left">
                            <img src="data:image/png;base64, {{ DNS2D::getBarcodePNG("$member->kode_member", 'QRCODE') }}"
                                alt="qrcode" height="45" widht="45">
                        </div>
                    </div>
                </td>
                @endforeach
            </tr>
            @endforeach

        </table>
    </section>
</body>

</html>