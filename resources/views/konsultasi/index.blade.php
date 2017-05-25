@extends('layouts.app')

@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">Konsultasi</div>

        <div class="panel-body">
            <form action="{{ route('konsultasi.index') }}" method="get">
				<div class="panel-body">
					<div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
						<label>Nama</label>
						<input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
					</div>

					<div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
						<label>Alamat</label>
						<input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}">
					</div>

					<div class="form-group {{ $errors->has('pekerjaan') ? 'has-error' : '' }}">
						<label>Pekerjaan</label>
						<input type="text" class="form-control" name="pekerjaan" value="{{ old('pekerjaan') }}">
					</div>
				</div>
				<div class="panel-footer">
					<button type="submit" class="btn btn-success">Next</button>
				</div>
			</form>

			@if($errors->all())
				@include('layouts._formError')
			@endif
        </div>
    </div>
@endsection
