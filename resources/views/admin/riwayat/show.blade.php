@extends('layouts.app')

@php
    $gejalas = unserialize($riwayat->gejala);
    $response = unserialize($riwayat->response);
    $hasil = unserialize($riwayat->hasil);
@endphp

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Detail Riwayat</div>
			
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Identitas</th>
                            <th>Gejala</th>
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
            <dl class="dl-horizontal">
                <dt>ID</dt>
                <dd>{{ $hasil['penyakit_id'] }}</dd>
                <dt>Penyakit</dt>
                <dd>{{ $hasil['penyakit_nama'] }}</dd>
                <dt>Persentase</dt>
                <dd>{{ $hasil['persen'] }}%</dd>
            </dl>
        </div>
    </div>
@endsection
