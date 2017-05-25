@extends('layouts.app')

@section('content')
	<div class="panel panel-success">
		<div class="panel-heading">Profil > Edit</div>

		{!! Form::model($user, ['route' => 'profil.update']) !!}
			<div class="panel-body">
				<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
					{{ Form::label('name', 'Nama') }}
					
					{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama lengkap', 'autocomplete' =>'off']) }}

					@if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
				</div>

				<div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
					{{ Form::label('username', 'Username') }}
					
					{{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username', 'autocomplete' =>'off']) }}

					@if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
				</div>	

				<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
					{{ Form::label('email', 'Email') }}
					
					{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail valid', 'autocomplete' =>'off']) }}

					@if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
				</div>	

				<div class="form-group {{ $errors->has('old_password') || Session::has('old_password') ? 'has-error' : '' }}">
					{{ Form::label('old_password', 'Sandi Lama') }}
						
					{{ Form::password('old_password', ['class' => 'form-control', 'placeholder' => 'Kata sandi lama', 'autocomplete' =>'off']) }}
							
					@if($errors->has('old_password') || Session::has('old_password'))
						<span class="help-block">
							{{ $errors->first('old_password') }} {{ Session::get('old_password') }}
						</span>
					@endif
				</div>

				<div class="form-group {{ $errors->has('new_password') ? 'has-error' : '' }}">
					{{ Form::label('new_password', 'Sandi Baru') }}
						
					{{ Form::password('new_password', ['class' => 'form-control', 'placeholder' => 'Kata sandi baru', 'autocomplete' =>'off']) }}
								
					@if($errors->has('new_password'))
						<span class="help-block">
							{{ $errors->first('new_password') }}
						</span>
					@endif
				</div>

				<div class="form-group {{ $errors->has('new_password_confirmation') ? 'has-error' : '' }}">
					{{ Form::label('new_password_confirmation', 'Ulangi Sandi Baru') }}
					
					{{ Form::password('new_password_confirmation', ['class' => 'form-control', 'placeholder' => 'Ulangi kata sandi baru', 'autocomplete' =>'off']) }}
						
					@if($errors->has('new_password_confirmation'))
						<span class="help-block">
							{{ $errors->first('new_password_confirmation') }}
						</span>
					@endif
				</div>
			</div>

			<div class="panel-footer">
				<a href="{{ route('profil.show') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
				
				<div class="pull-right">
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>
		{!! Form::close() !!}
	</div>
@endsection