@extends('theme.backoffice.layouts.admin')

@section('title', 'Orejitas Vet')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.tipodocumento.index') }}">Tipos de Documentos</a></li>
	<li>Crear Tipo de Documento</li>
@endsection

@section('content')
	
	<div class="section">
		<p class="caption">Introduce los datos para crear un nuevo tipo de documento.</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
					<span class="card-title">Crear Tipo de Documento</span>
					<div class="row">
					<form class="col s12" method="post" action="{{ route('backoffice.tipodocumento.store') }}">
						
						{{ csrf_field() }}

						<div class="row">
						<div class="input-field col s12">
							<input id="tipd_nombre" type="text" name="tipd_nombre">
							<label for="tipd_nombre">Nombre del Documento de Identidad</label>
							@if ($errors->has('tipd_nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red;">{{ $errors->first('tipd_nombre') }}</strong>
                                </span>
                            @endif
						</div>
						</div>
						<div class="row">
						<div class="input-field col s12">
							<textarea id="tipd_abreviatura" class="materialize-textarea" name="tipd_abreviatura"></textarea>
							<label for="tipd_abreviatura">Abreviatura</label>
							@if ($errors->has('tipd_abreviatura'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red;">{{ $errors->first('tipd_abreviatura') }}</strong>
                                </span>
                            @endif
						</div>
						<div class="row">
						<div class="input-field col s12">
							<button class="btn waves-effect waves-light right" type="submit" style="background-color: #74DF00;">Guardar
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