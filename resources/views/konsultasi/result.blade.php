@extends('layouts.app')

@php
    $gejalas = unserialize($riwayat->gejala);
    $hasil = unserialize($riwayat->hasil);
@endphp

@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">
            Konsultasi > Result
            <div class="pull-right">
                <a target="_blank" href="{{ route('konsultasi.cetak', $riwayat->id) }}" class="btn btn-warning btn-xs">Cetak</a>
            </div>
        </div>
			
        <div class="panel-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="2">Identitas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>{{ $riwayat->nama }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $riwayat->alamat }}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>{{ $riwayat->pekerjaan }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Gejala yang dipilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach($gejalas as $gejala)
                            <tr>
                                <td>{{ $no++ }}. {{ $gejala->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="2">Diagnosa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Penyakit</td>
                        <td>{{ $hasil['penyakit_nama'] }}</td>
                    </tr>
                    <tr>
                        <td>Persentase</td>
                        <td>{{ $hasil['persen'] }}%</td>
                    </tr>
                    <tr>
                        <td>Pengendalian</td>
                        <td>{{ $penyakit->pengendalian }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
