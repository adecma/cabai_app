@extends('layouts.app')

@section('content')
	<div class="panel panel-success">
		<div class="panel-heading">
			Gejala > Tambah
		</div>

		<form action="{{ route('gejala.store') }}" method="post">
			<div class="panel-body">
				{{ csrf_field() }}

				<div class="form-group {{ $errors->has('gejala') ? 'has-error' : '' }}">
					<label>Gejala</label>
					<input type="text" class="form-control" name="gejala" value="{{ old('gejala') }}">
				</div>

				@if($errors->all())
					@include('layouts._formError')
				@endif
			</div>
			<div class="panel-footer">
				<a href="{{ route('gejala.index') }}" class="btn btn-default">Kembali</a>

				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
		</form>
	</div>
@endsection