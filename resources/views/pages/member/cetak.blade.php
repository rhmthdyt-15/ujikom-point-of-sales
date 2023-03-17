<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Kartu Member</title>
      <style>
        .box {
            position: relative;
            width: 320px;
            height: 200px;
            border-radius: 20px;
            background-color: #E6E6FA;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        .logo {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background-color: #32C8DE;
            display: flex;
            align-items: center;
            text-align: center;
            color: #FFF;
            font-size: 28px;
            font-weight: bold;
            letter-spacing: 4px;
            margin-bottom: 10px;
        }

        .nama {
            position: absolute;
            top: 80px;
            left: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        /* .nama {
            position: absolute;
            top: 80px;
            left: 40px;
            font-size: 20px;
            font-weight: bold;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 2px;
        } */
        
        .telepon {
            position: absolute;
            top: 120px;
            left: 20px;
            font-size: 18px;
            color: #333;
        }
        .barcode {
            position: absolute;
            bottom: 40px;
            right: 40px;
        }
    </style>
</head>

<body>
    <section style="border: 1px solid #fff">
        <table width="100%">
            @foreach ($datamember as $key => $data)
            <tr>
                @foreach ($data as $member)
                <td class="text-center" width="50%">
                    <div class="box">
                        <div class="logo">
                            <p>{{ config('app.name') }}</p>
                        </div>
                        <div class="nama">
                            {{ $member->nama }}
                        </div>
                        <div class="telepon">
                            {{ $member->telepon }}
                        </div>
                        <div class="barcode text-left">
                           {!! DNS2D::getBarcodeHTML('$member->kode_member', 'QRCODE', 2, 2) !!}
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