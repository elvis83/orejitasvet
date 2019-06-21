@extends('theme.backoffice.layouts.admin')

@section('title', 'Orejitas Vet')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.persona.index') }}">Persona</a></li>
	<li>Ingresar datos personales</li>
@endsection

@section('content')
	
	<div class="section">
		<p class="caption">Introduce los datos personales.</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
					<span class="card-title">Ingresar datos personales</span>
					<div class="row">
					<form class="col s12" method="post" action="{{ route('backoffice.persona.store') }}">
						
						{{ csrf_field() }}

						<div class="row">
							<div class="input-field col s3">
								<input id="per_apepat" type="text" name="per_apepat">
								<label for="per_apepat">Apellido Paterno</label>
								@if ($errors->has('per_apepat'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('per_apepat') }}</strong>
	                                </span>
	                            @endif
							</div>
							<div class="input-field col s3">
								<input id="per_apemat" type="text" name="per_apemat">
								<label for="per_apemat">Apellido Materno</label>
								@if ($errors->has('per_apemat'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('per_apemat') }}</strong>
	                                </span>
	                            @endif
							</div>
							<div class="input-field col s6">
								<input id="per_nombres" type="text" name="per_nombres">
								<label for="per_nombres">Nombres</label>
								@if ($errors->has('per_nombres'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('per_nombres') }}</strong>
	                                </span>
	                            @endif
							</div>
						</div>
						<div class="row">
							<div class="input-field col s2">
								<select name="tipd_id">
									<option value="" disabled="" selected="">Documento</option>
									@foreach($tipodocumentos as $tipodocumento)
										<option value="{{ $tipodocumento->tipd_id }}">{{ $tipodocumento->tipd_abreviatura }}</option>
									@endforeach
								</select>
								@if ($errors->has('tipd_id'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('tipd_id') }}</strong>
	                                </span>
                            	@endif
							</div>
							<div class="input-field col s2">
								<input id="per_nrodoc" type="text" name="per_nrodoc">
								<label for="per_nrodoc">Nro. Documento</label>
								@if ($errors->has('per_nrodoc'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('per_nrodoc') }}</strong>
	                                </span>
	                            @endif
							</div>
							<div class="input-field col s8">
								<input id="per_dir" type="text" name="per_dir"></input>
								<label for="per_dir">Dirección</label>
								@if ($errors->has('per_dir'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('per_dir') }}</strong>
	                                </span>
	                            @endif
							</div>
						</div>
						<div class="row">
							<div class="input-field col s4">
								<label>Fecha Nacimiento</label>
							</div>
							<div class="input-field col s4">
								<label>Sexo</label>
							</div>
							<div class="input-field col s4">
								<label>Estado Civil</label>
							</div>							
							<div class="input-field col s4">
								<input id="per_fecnac" type="date" name="per_fecnac">
								<!--<label for="per_fecnac">Nacimiento</label>-->
								@if ($errors->has('per_fecnac'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('per_fecnac') }}</strong>
	                                </span>
	                            @endif
							</div>							
							<div class="input-field col s4">
								<select name="per_sexo">
									<option value="" disabled="" selected="">Seleccione</option>
									<option value="H">Hombre</option>
									<option value="M">Mujer</option>
									<option value="I">Indefinido</option>
								</select>
								@if ($errors->has('per_sexo'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('per_sexo') }}</strong>
	                                </span>
                            	@endif
							</div>
							<div class="input-field col s4">															
								<select name="per_ecivil">
									<option value="" disabled="" selected="">Seleccione</option>
									<option value="S">Soltero(a)</option>
									<option value="C">Casado(a)</option>
									<option value="D">Divorciado(a)</option>
									<option value="V">Viudo(a)</option>
								</select>
								@if ($errors->has('per_ecivil'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('per_ecivil') }}</strong>
	                                </span>
                            	@endif
							</div>							
						</div>
						<div class="row">
							<div class="input-field col s4">
								<input id="per_tel" type="text" name="per_tel"></input>
								<label for="per_tel">Teléfono</label>
								@if ($errors->has('per_tel'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('per_tel') }}</strong>
	                                </span>
	                            @endif
							</div>
							<div class="input-field col s4">
								<input id="per_cel" type="text" name="per_cel"></input>
								<label for="per_cel">Celular</label>
								@if ($errors->has('per_cel'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('per_cel') }}</strong>
	                                </span>
	                            @endif
							</div>
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