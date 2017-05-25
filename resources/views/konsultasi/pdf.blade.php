<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
        .tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
        .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
        .tg .tg-head{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
        .tg .tg-center{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
        .tg .tg-left{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
    </style>
</head>
<body>
    <div style="font-family:Arial; font-size:12px;">
        <center><h3>Hasil Konsultasi</h3></center>
    </div>
    @php
        $gejalas = unserialize($riwayat->gejala);
        $hasil = unserialize($riwayat->hasil);
        $no = 1;
    @endphp
    <table class="tg">
        <thead>
            <tr>
                <th class="tg-head" colspan="2">Identitas</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tg-left">Nama</td>
                <td class="tg-left">{{ $riwayat->nama }}</td>
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

    <table class="tg">
        <thead>
            <tr>
                <th class="tg-head">Gejala yang dipilih</th>
            </tr>
        </thead>
        <tbody>
            @foreach($gejalas as $gejala)
                <tr>
                    <td class="tg-left">{{ $no++ }}. {{ $gejala->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="tg">
        <thead>
            <tr>
                <th class="tg-head" colspan="2">Diagnosa</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tg-left">Penyakit</td>
                <td class="tg-left">{{ $hasil['penyakit_nama'] }}</td>
            </tr>
            <tr>
                <td class="tg-left">Persentase</td>
                <td class="tg-left">{{ $hasil['persen'] }}%</td>
            </tr>
            <tr>
                <td class="tg-left">Pengendalian</td>
                <td class="tg-left">{{ $penyakit->pengendalian }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>