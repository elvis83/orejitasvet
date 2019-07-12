@extends('theme.backoffice.layouts.admin')

@section('title', 'Editar Servicio')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.servicio.index') }}">Servicios</a></li>
	<li class="active">Editar Servicio</li>
@endsection

@section('content')
	
	<div class="section">
		<p class="caption">Introduce los datos del Servicio.</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
					<span class="card-title">Editar Servicio</span>
					<div class="row">
					<form class="col s12" method="post" action="{{ route('backoffice.servicio.update',$servicio) }}">
						
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						
						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix">healing</i>
								<input id="ser_nombre" type="text" name="ser_nombre" value="{{ $servicio->ser_nombre }}">
								<label for="ser_nombre">Nombre del Servicio</label>
								@if ($errors->has('ser_nombre'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('ser_nombre') }}</strong>
	                                </span>
	                            @endif
							</div>									
						</div>						
						<div class="input-field col s12">
							<button class="btn waves-effect waves-light right" type="submit" style="background-color: #74DF00;">ACTUALIZAR
							<i class="material-icons right">send</i>
							</button>
						</div>
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