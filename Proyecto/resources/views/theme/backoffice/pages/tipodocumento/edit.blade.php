@extends('theme.backoffice.layouts.admin')

@section('title', 'Editar documento de identidad: ' . $tipodocumento->tipd_nombre)

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.tipodocumento.index') }}">Documentos de Identidad</a></li>
	<li><a href="{{ route('backoffice.tipodocumento.show', $tipodocumento) }}">{{ $tipodocumento->tipd_nombre }}</a></li>
	<li>Edición del Documento</li>
@endsection

@section('content')
	
	<div class="section">
		<p class="caption">Edición del Documento: {{ $tipodocumento->tipd_nombre }}</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
					<div class="row">
					<form class="col s12" method="post" action="{{ route('backoffice.tipodocumento.update', $tipodocumento) }}">
						
						{{ csrf_field() }}

						{{ method_field('PUT') }}

						<div class="row">
						<div class="input-field col s12">
							<input id="tipd_nombre" type="text" name="tipd_nombre" value="{{ $tipodocumento->tipd_nombre }}">
							<label for="tipd_nombre">Nombre</label>
							@if ($errors->has('tipd_nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red;">{{ $errors->first('tipd_nombre') }}</strong>
                                </span>
                            @endif
						</div>
						</div>
						<div class="row">
						<div class="input-field col s12">
							<textarea id="tipd_abreviatura" class="materialize-textarea" name="tipd_abreviatura">{{ $tipodocumento->tipd_abreviatura }}</textarea>
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