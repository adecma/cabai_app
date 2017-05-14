@extends('layouts.app')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Profil
			</div>
			<div class="panel-body">
				<dl class="dl-horizontal">
					<dt>Nama</dt>
					<dd>{{ $user->name }}</dd>
					<dt>E-mail</dt>
					<dd>{{ $user->email }}</dd>
				</dl>
			</div>

			<div class="panel-footer">
				<div class="text-right">
					<a href="{{ route('profil.edit') }}" class="btn btn-info"> Edit</a>
				</div>				
			</div>
		</div>
	</div>
@endsection