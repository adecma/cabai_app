@extends('layouts.app')

@section('content')
	<div class="panel panel-success">
		<div class="panel-heading">
			Hubungan > Tambah
		</div>

		<form action="{{ route('hubungan.store') }}" method="post">
			<div class="panel-body">
				{{ csrf_field() }}

				<input type="hidden" name="penyakit" value="{{ request('penyakit') }}">

				<div class="form-group {{ $errors->has('penyakit') ? 'has-error' : '' }}">
					<label>Penyakit</label>
					<select name="hiddenPenyakit" class="form-control" disabled="">
						<option value="">--pilih--</option>
						@foreach($penyakits as $data)
							@if(request('penyakit') == $data->id)
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
						<option value="">--pilih--</option>
						@foreach($gejalas as $data)
							@if(old('gejala') == $data->name)
								<option value="{{ $data->id }}" selected>{{ title_case($data->name) }}</option>
							@else
								<option value="{{ $data->id }}">{{ title_case($data->name) }}</option>
							@endif
						@endforeach
					</select>
				</div>

				<div class="form-group {{ $errors->has('bobot') ? 'has-error' : '' }}">
					<label>bobot</label>
					<input type="text" class="form-control" name="bobot" value="{{ old('bobot') }}">
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