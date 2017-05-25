@extends('layouts.app')

@section('content')
	<div class="panel panel-success">
		<div class="panel-heading">
			Penyakit > Tambah
		</div>

		<form action="{{ route('penyakit.store') }}" method="post">
			<div class="panel-body">
				{{ csrf_field() }}

				<div class="form-group {{ $errors->has('penyakit') ? 'has-error' : '' }}">
					<label>Penyakit</label>
					<input type="text" class="form-control" name="penyakit" value="{{ old('penyakit') }}">
				</div>

				<div class="form-group {{ $errors->has('probabilitas') ? 'has-error' : '' }}">
					<label>probabilitas</label>
					<input type="text" class="form-control" name="probabilitas" value="{{ old('probabilitas') }}">
				</div>

				@if($errors->all())
					@include('layouts._formError')
				@endif
			</div>
			<div class="panel-footer">
				<a href="{{ route('penyakit.index') }}" class="btn btn-default">Kembali</a>

				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
		</form>
	</div>
@endsection