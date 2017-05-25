@extends('layouts.app')

@php
    $gejalas = unserialize($riwayat->gejala);
    $response = unserialize($riwayat->response);
    $hasil = unserialize($riwayat->hasil);
@endphp

@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">
            Riwayat > Show
            <div class="pull-right">
                <a target="_blank" href="{{ route('riwayat.showCetak', $riwayat->id) }}" class="btn btn-warning btn-xs">Cetak</a>
            </div>
        </div>
			
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2">Identitas</th>
                            <th>Gejala</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>{{ $riwayat->nama }}</td>
                            <td rowspan="3">
                                <ul class="list-unstyled">
                                    @foreach($gejalas as $gejala)
                                        <li># {{ $gejala->name }} ({{ $gejala->id }})</li>
                                    @endforeach
                                </ul>
                            </td>
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
            </div>
            
            <h3>Step 1</h3>
            <div class="table-responsive">
            	<table class="table table-hover table-bordered">
            		<thead>
            			<tr>
	            			@foreach($response as $data)
		            			<th colspan="2">Penyakit ID : {{ $data['penyakit_id'] }}</th>
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
									<td>{{ $response[$j]['gejala'][$i]['gejala_id'] }}</td>
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
                                <th colspan="3">Penyakit ID : {{ $data['penyakit_id'] }}</th>
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
                                <th colspan="2">Penyakit ID : {{ $data['penyakit_id'] }}</th>
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

            <h3>Hasil</h3>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <tbody>
                        <tr>
                            <td><strong>ID</strong></td>
                            <td>{{ $hasil['penyakit_id'] }}</td>
                        </tr>
                        <tr>
                            <td><strong>Penyakit</strong></td>
                            <td>{{ $hasil['penyakit_nama'] }}</td>
                        </tr>
                        <tr>
                            <td><strong>Persentase</strong></td>
                            <td>{{ $hasil['persen'] }}%</td>
                        </tr>
                        <tr>
                            <td><strong>Pengendalian</strong></td>
                            <td>{{ $penyakit->pengendalian}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
