<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
        .tg td{font-family:Arial;font-size:11px;padding:4px 2px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
        .tg th{font-family:Arial;font-size:12px;font-weight:normal;padding:4px 2px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
        .tg .tg-head{font-weight:bold;font-size:11px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
        .tg .tg-center{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
        .tg .tg-left{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
    </style>

    <style>
        .page-break {
            page-break-after: always;
        }
        
        .header,
        .footer {
            width: 100%;
            text-align: center;
            position: fixed;
        }
        .header {
            top: 0px;
        }
        .footer {
            bottom: 0px;
        }
        .pagenum:before {
            content: counter(page);
        }
    </style>
</head>
<body>
    <div style="font-family:Arial; font-size:12px;">
        <center><h3>Detail Riwayat</h3></center>
    </div>
    @php
        $gejalas = unserialize($riwayat->gejala);
        $response = unserialize($riwayat->response);
        $hasil = unserialize($riwayat->hasil);
    @endphp
    
    <table class="tg">
        <thead>
            <tr>
                <th colspan="2" class="tg-head">Identitas</th>
                <th class="tg-head">Gejala</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tg-left">Nama</td>
                <td class="tg-left">{{ $riwayat->nama }}</td>
                <td class="tg-left" rowspan="3">
                    <ul>
                        @foreach($gejalas as $gejala)
                            <li>{{ $gejala->name }} ({{ $gejala->id }})</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="tg-left">Alamat</td>
                <td class="tg-left">{{ $riwayat->alamat }}</td>
            </tr>
            <tr>
                <td class="tg-left">Pekerjaan</td>
                <td class="tg-left">{{ $riwayat->pekerjaan }}</td>
            </tr>
        </tbody>
    </table>
    <br>
            
    <h3>Step 1</h3>
    <table class="tg">
        <thead>
            <tr>
                @foreach($response as $data)
                    <th class="tg-head" colspan="2">Penyakit ID : {{ $data['penyakit_id'] }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                @for($i = 0; $i < count($response); $i++)
                    <td class="tg-center">Gejala</td>
                    <td class="tg-center">Bobot</td>
                @endfor
            </tr>
            @for($i = 0; $i < count($response[0]['gejala']); $i++)
                <tr>
                    @for($j = 0; $j < count($response); $j++)
                        <td class="tg-center">{{ $response[$j]['gejala'][$i]['gejala_id'] }}</td>
                        <td class="tg-center">{{ $response[$j]['gejala'][$i]['bobot'] }}</td>
                    @endfor
                </tr>
            @endfor
        </tbody>
    </table>
    <br>

    <h3>Step 2</h3>
    <table class="tg">
        <thead>
            <tr>
                @foreach($response as $data)
                    <th class="tg-head" colspan="3">Penyakit ID : {{ $data['penyakit_id'] }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                @for($i = 0; $i < count($response); $i++)
                    <td class="tg-center">Atas</td>
                    <td class="tg-center">Bawah</td>
                    <td class="tg-center">Dibagi</td>
                @endfor
            </tr>
            @for($i = 0; $i < count($response[0]['gejala']); $i++)
                <tr>
                    @for($j = 0; $j < count($response); $j++)
                        <td class="tg-center">{{ $response[$j]['gejala'][$i]['atas'] }}</td>
                        <td class="tg-center">{{ $response[$j]['gejala'][$i]['bawah'] }}</td>
                        <td class="tg-center">{{ $response[$j]['gejala'][$i]['dibagi'] }}</td>
                    @endfor
                </tr>
            @endfor
        </tbody>
    </table>
    <br>

    <h3>Step 3</h3>
    <table class="tg">
        <thead>
            <tr>
                @foreach($response as $data)
                    <th class="tg-head" colspan="2">Penyakit ID : {{ $data['penyakit_id'] }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                @for($i = 0; $i < count($response); $i++)
                    <td class="tg-center">SUM</td>
                    <td class="tg-center">Persen</td>
                @endfor
            </tr>

            <tr>
                @for($i = 0; $i < count($response); $i++)
                    <td class="tg-center">{{ $response[$i]['sum'] }}</td>
                    <td class="tg-center">{{ $response[$i]['persen'] }}%</td>
                @endfor
            </tr>
            
        </tbody>
    </table>
    
    <div class="page-break"></div>

    <h3>Hasil</h3>
    <table class="tg">
        <tbody>
            <tr>
                <td class="tg-left"><strong>ID</strong></td>
                <td class="tg-left">{{ $hasil['penyakit_id'] }}</td>
            </tr>
            <tr>
                <td class="tg-left"><strong>Penyakit</strong></td>
                <td class="tg-left">{{ $hasil['penyakit_nama'] }}</td>
            </tr>
            <tr>
                <td class="tg-left"><strong>Persentase</strong></td>
                <td class="tg-left">{{ $hasil['persen'] }}%</td>
            </tr>
            <tr>
                <td class="tg-left"><strong>Pengendalian</strong></td>
                <td class="tg-left">{{ $penyakit->pengendalian}}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>