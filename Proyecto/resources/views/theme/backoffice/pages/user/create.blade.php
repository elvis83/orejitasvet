@extends('theme.backoffice.layouts.admin')

@section('title', 'Orejitas Vet')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.user.index') }}">Usuarios del Sistema</a></li>
	<li>Crear Usuario</li>
@endsection

@section('content')
	
	<div class="section">
		<p class="caption">Introduce los datos para crear un nuevo usuario.</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
					<span class="card-title">Crear Usuario</span>
					<div class="row">
					<form class="col s12" method="post" action="{{ route('backoffice.user.store') }}">
						
						{{ csrf_field() }}

						<div class="row">
						<div class="input-field col s12">
							<select name="role" id="role" required="">
                                <option value="" disabled="" selected="">-- Seleccione un rol --</option>
                                @foreach($roles as $role)
                                	<option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
						</div>	

						<div class="row">
						<div class="input-field col s12">
							<input id="name" type="text" name="name">
							<label for="name">Nombre del usuario</label>
							@if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red;">{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
						</div>
						</div>	

						<div class="row">
						<div class="input-field col s12">
							<input id="dob" type="date" name="dob">
							@if ($errors->has('dob'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red;">{{ $errors->first('dob') }}</strong>
                                </span>
                            @endif
						</div>
						</div>

						<div class="row">
						<div class="input-field col s12">
							<input id="email" type="text" name="email">
							<label for="email">Correo electrónico</label>
							@if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
						</div>
						</div>

						<div class="row">
						<div class="input-field col s12">
							<input id="password" type="text" name="password">
							<label for="password">Contraseña</label>
							@if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red;">{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
						</div>
						</div>

						<div class="row">
						<div class="input-field col s12">
							<input id="password" type="text" name="password">
							<label for="password">Confirmar contraseña</label>
							@if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red;">{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
						</div>
						</div>

						<div class="row">
						<div class="input-field col s12">
							<button class="btn waves-effect waves-light right" type="submit" style="background-color: #74DF00;">GUARDAR
							<i class="material-icons right">send</i>
							</button>
						</div>
						</div>
					</form>
					</div>
					</div>
				</div>
				</div>
			</div>
	    </div>
	</div>

@endsection

@section('foot')
@endsection