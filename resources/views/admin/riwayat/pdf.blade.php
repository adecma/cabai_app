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
        <center><h3>Data Riwayat</h3></center>
    </div>

    <table class="tg">
        <thead>
            <tr>
                <th class="tg-head">No</th>
                <th class="tg-head">Nama</th>
                <th class="tg-head">Alamat</th>
                <th class="tg-head">Pekerjaan</th>
                <th class="tg-head">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($riwayats as $riwayat)
                <tr>
                    <td class="tg-center">{{ $no++ }}</td>
                    <td class="tg-left">{{ $riwayat->nama }}</td>
                    <td class="tg-left">{{ $riwayat->alamat }}</td>
                    <td class="tg-left">{{ $riwayat->pekerjaan }}</td>
                    <td class="tg-center">{{ $riwayat->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>