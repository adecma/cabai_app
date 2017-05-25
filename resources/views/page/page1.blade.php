@extends('layouts.app')

@php
	$no = 1;
@endphp

@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">Tentang Penyakit</div>

        <div class="panel-body">
        	<h3 class="text-center">
        		Tentang Penyakit Pada Ikan Mas
        	</h3>

        	<div class="table-responsive">
        		<table class="table table-hover table-bordered">
        			<thead>
        				<tr>
        					<th>No</th>
        					<th>Nama Penyakit</th>
        					<th>Keterangan</th>
        					<th>Pengendalian</th>
        				</tr>
        			</thead>
        			<tbody>
        				@foreach($penyakits as $penyakit)
	        				<tr>
	        					<td>{{ $no++ }}</td>
	        					<td>{{ $penyakit->name }}</td>
	        					<td>{{ $penyakit->keterangan }}</td>
	        					<td>{{ $penyakit->pengendalian }}</td>
	        				</tr>
        				@endforeach
        			</tbody>
        		</table>
        	</div>
        </div>
    </div>
@endsection
