@extends('layouts.app')

@section('content')
	<div class="panel panel-success">
		<div class="panel-heading">
			Profil
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
				<dt>Nama</dt>
				<dd>{{ $user->name }}</dd>
				<dt>Username</dt>
				<dd>{{ $user->username }}</dd>
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
@endsection