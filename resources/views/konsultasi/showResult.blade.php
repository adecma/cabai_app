@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Detail Nilai</div>
			
        <div class="panel-body">
            <h3>Step 1</h3>
            <div class="table-responsive">
            	<table class="table table-hover table-bordered">
            		<thead>
            			<tr>
	            			@foreach($final as $data)
		            			<th colspan="2">Penyakit ID : {{ $data['penyakit_id'] }}</th>
	            			@endforeach
            			</tr>
            		</thead>
            		<tbody>
                        <tr>
                            @for($i = 0; $i < $count['penyakit']; $i++)
                                <td>Gejala</td>
                                <td>Bobot</td>
                            @endfor
                        </tr>
            			@for($i = 0; $i < $count['gejala']; $i++)
							<tr>
								@for($j = 0; $j < $count['penyakit']; $j++)
									<td>{{ $final[$j]['gejala'][$i]['gejala_id'] }}</td>
									<td>{{ $final[$j]['gejala'][$i]['bobot'] }}</td>
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
                            @foreach($final as $data)
                                <th colspan="3">Penyakit ID : {{ $data['penyakit_id'] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @for($i = 0; $i < $count['penyakit']; $i++)
                                <td>Atas</td>
                                <td>Bawah</td>
                                <td>Dibagi</td>
                            @endfor
                        </tr>
                        @for($i = 0; $i < $count['gejala']; $i++)
                            <tr>
                                @for($j = 0; $j < $count['penyakit']; $j++)
                                    <td>{{ $final[$j]['gejala'][$i]['atas'] }}</td>
                                    <td>{{ $final[$j]['gejala'][$i]['bawah'] }}</td>
                                    <td>{{ $final[$j]['gejala'][$i]['dibagi'] }}</td>
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
                            @foreach($final as $data)
                                <th colspan="2">Penyakit ID : {{ $data['penyakit_id'] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @for($i = 0; $i < $count['penyakit']; $i++)
                                <td>SUM</td>
                                <td>Persen</td>
                            @endfor
                        </tr>

                        <tr>
                            @for($i = 0; $i < $count['penyakit']; $i++)
                                <td>{{ $final[$i]['sum'] }}</td>
                                <td>{{ $final[$i]['persen'] }}%</td>
                            @endfor
                        </tr>
                        
                    </tbody>
                </table>
            </div>

            <h3>Final</h3>
            <dl class="dl-horizontal">
                <dt>Penyakit</dt>
                <dd>{{ $hasil['penyakit_nama'] }}</dd>
                <dt>Persentase</dt>
                <dd>{{ $hasil['persen'] }}%</dd>
            </dl>
        </div>
    </div>
@endsection
