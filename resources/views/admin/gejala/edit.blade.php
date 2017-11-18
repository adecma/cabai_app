@extends('layouts.app')

@section('content')
	<div class="panel panel-success">
		<div class="panel-heading">
			Gejala > Edit
		</div>

		<form action="{{ route('gejala.update', $gejala->id) }}" method="post">
			<div class="panel-body">
				{{ csrf_field() }}

				{{ method_field('put') }}

				<div class="form-group">
					<label>ID</label>
					<input type="text" class="form-control" disabled="" value="{{ 'G' . $gejala->id }}">
				</div>

				<div class="form-group {{ $errors->has('gejala') ? 'has-error' : '' }}">
					<label>Gejala</label>
					<input type="text" class="form-control" name="gejala" value="{{ old('gejala', $gejala->name) }}">
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
