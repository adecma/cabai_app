@extends('layouts.app')

@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">Beranda</div>

        <div class="panel-body">
            Selamat datang {{ Auth::user()->name }} di website Sistem Pakar Penyakit Ikan Mas
        </div>
    </div>
@endsection
