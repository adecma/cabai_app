@extends('layouts.app')

@php
    $gejalas = unserialize($riwayat->gejala);
    $hasil = unserialize($riwayat->hasil);
    $response = unserialize($riwayat->response);
@endphp

@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">
            Konsultasi > Result
            <div class="pull-right">
                <form action="{{ route('konsultasi.index') }}" method="get">
                    <input type="hidden" name="nama" value="{{ session('_old_input')['nama'] }}">
                    <input type="hidden" name="alamat" value="{{ session('_old_input')['alamat'] }}">
                    <input type="hidden" name="pekerjaan" value="{{ session('_old_input')['pekerjaan'] }}">
                    <a target="_blank" href="{{ route('konsultasi.cetak', $riwayat->id) }}" class="btn btn-warning btn-xs">Cetak</a>

                    @if(count(session('_old_input')) > 0)
                        <button type="submit" class="btn btn-xs btn-warning">Konsultasi Lagi</button>
                    @endif
                </form>
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
                                <td>{{ $no++ }}. {{ 'G' . $gejala->id . ' - ' . $gejala->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <h3>Step 1</h3>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            @foreach($response as $data)
                                <th colspan="2">Penyakit ID : P{{ $data['penyakit_id'] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @for($i = 0; $i < count($response); $i++)
                                <td>Gejala</td>
                                <td>Bobot</td>
                            @endfor
                        </tr>
                        @for($i = 0; $i < count($response[0]['gejala']); $i++)
                            <tr>
                                @for($j = 0; $j < count($response); $j++)
                                    <td>G{{ $response[$j]['gejala'][$i]['gejala_id'] }}</td>
                                    <td>{{ $response[$j]['gejala'][$i]['bobot'] }}</td>
                                @endfor
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

            <h3>Step 2</h3>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            @foreach($response as $data)
                                <th colspan="3">Penyakit ID : P{{ $data['penyakit_id'] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @for($i = 0; $i < count($response); $i++)
                                <td>Atas</td>
                                <td>Bawah</td>
                                <td>Dibagi</td>
                            @endfor
                        </tr>
                        @for($i = 0; $i < count($response[0]['gejala']); $i++)
                            <tr>
                                @for($j = 0; $j < count($response); $j++)
                                    <td>{{ $response[$j]['gejala'][$i]['atas'] }}</td>
                                    <td>{{ $response[$j]['gejala'][$i]['bawah'] }}</td>
                                    <td>{{ $response[$j]['gejala'][$i]['dibagi'] }}</td>
                                @endfor
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

            <h3>Step 3</h3>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            @foreach($response as $data)
                                <th colspan="2">Penyakit ID : P{{ $data['penyakit_id'] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @for($i = 0; $i < count($response); $i++)
                                <td>SUM</td>
                                <td>Persen</td>
                            @endfor
                        </tr>

                        <tr>
                            @for($i = 0; $i < count($response); $i++)
                                <td>{{ $response[$i]['sum'] }}</td>
                                <td>{{ $response[$i]['persen'] }}%</td>
                            @endfor
                        </tr>

                    </tbody>
                </table>
            </div>

            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="3">Diagnosa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Penyakit</td>
                        <td>{{ 'P' . $hasil['penyakit_id'] . ' - ' . $hasil['penyakit_nama'] }}</td>
                        <td rowspan="3" width="30%"><img src="{{ isset($hasil['img']) ? asset('img/' . $hasil['img']) : asset('img/no-pict.jpg') }}" class="img-responsive" alt="Image"></td>
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
