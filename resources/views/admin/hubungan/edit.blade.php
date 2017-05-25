@extends('layouts.app')

@section('content')
	<div class="panel panel-success">
		<div class="panel-heading">
			Hubungan > Edit
		</div>

		<form action="{{ route('hubungan.update', $hubungan->id) }}" method="post">
			<div class="panel-body">
				{{ csrf_field() }}

				{{ method_field('put') }}

				<input type="hidden" name="penyakit" value="{{ $hubungan->penyakit_id }}">

				<div class="form-group {{ $errors->has('penyakit') ? 'has-error' : '' }}">
					<label>Penyakit</label>
					<select name="readPenyakit" class="form-control" disabled="">
						@foreach($penyakits as $data)
							@if(old('penyakit', $hubungan->penyakit_id) == $data->id)
								<option value="{{ $data->id }}" selected>{{ title_case($data->name) }}</option>
							@else
								<option value="{{ $data->id }}">{{ title_case($data->name) }}</option>
							@endif
						@endforeach
					</select>
				</div>

				<div class="form-group {{ $errors->has('gejala') ? 'has-error' : '' }}">
					<label>Gejala</label>
					<select name="gejala" class="form-control">
						@foreach($gejalas as $data)
							@if(old('gejala', $hubungan->gejala_id) == $data->id)
								<option value="{{ $data->id }}" selected>{{ title_case($data->name) }}</option>
							@else
								<option value="{{ $data->id }}">{{ title_case($data->name) }}</option>
							@endif
						@endforeach
					</select>
				</div>

				<div class="form-group {{ $errors->has('bobot') ? 'has-error' : '' }}">
					<label>Bobot</label>
					<input type="text" class="form-control" name="bobot" value="{{ old('bobot', $hubungan->bobot) }}">
				</div>

				@if($errors->all())
					@include('layouts._formError')
				@endif
			</div>
			<div class="panel-footer">
				<a href="{{ route('hubungan.index') }}" class="btn btn-default">Kembali</a>

				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
		</form>
	</div>
@endsection