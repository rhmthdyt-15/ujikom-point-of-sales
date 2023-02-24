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
                    @foreach ($data as $item )
                         
                    @endforeach
                    <td class="text-center" with="50%">
                         <div class="box">
                              <img src="{{ asset('/public/templates/images/member.png') }}" alt="card" >
                              <div class="logo">
                                   <p>{{ config('app.name') }}</p>
                                   <img src="{{ asset('/public/templates/images/logo3.png') }}" alt="logo">
                              </div>
                              <div class="nama">
                                   {{ $item->nama }}
                              </div>
                              <div class="telepon">
                                   {{ $item->telepon }}
                              </div>
                         </div>
                    </td>
               </tr>
               @endforeach
          </table>
     </section>
</body>
</html>