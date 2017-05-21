@extends('layouts.app')

@php
    $gejalas = unserialize($riwayat->gejala);
    $hasil = unserialize($riwayat->hasil);
@endphp

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">Result</div>
			
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Identitas</th>
                            <th>Gejala</th>
                            <th>Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <dl class="dl-horizontal">
                                    <dt>Nama</dt>
                                    <dd>{{ $riwayat->nama }}</dd>
                                    <dt>Alamat</dt>
                                    <dd>{{ $riwayat->alamat }}</dd>
                                    <dt>Pekerjaan</dt>
                                    <dd>{{ $riwayat->pekerjaan }}</dd>
                                </dl>
                            </td>
                            <td>
                                <ul class="list-unstyled">
                                    @foreach($gejalas as $gejala)
                                        <li>{{ $gejala->name }} ({{ $gejala->id }})</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <dl class="dl-horizontal">
                                    <dt>Penyakit</dt>
                                    <dd>{{ $hasil['penyakit_nama'] }}</dd>
                                    <dt>Persentase</dt>
                                    <dd>{{ $hasil['persen'] }}%</dd>
                                </dl>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
