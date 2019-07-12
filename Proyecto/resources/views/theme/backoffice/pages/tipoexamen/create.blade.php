@extends('theme.backoffice.layouts.admin')

@section('title', 'Crear tipo de examen')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.tipoexamen.index') }}">Tipos de Exámenes</a></li>
	<li class="active">Crear tipo de examen</li>
@endsection

@section('content')
	
	<div class="section">
		<p class="caption">Introduce los datos de las tipo de examen.</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s6 offset-m3">
					<div class="card">
					<div class="card-content">
					<span class="card-title">Crear tipo de examen</span>
					<div class="row">
					<form class="col s12" method="post" action="{{ route('backoffice.tiposervicio.store') }}">
						
						{{ csrf_field() }}
						
						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix">healing</i>
								<input id="tipr_nombre" type="text" name="tipr_nombre" autofocus="">
								<label for="tipr_nombre">Nombre del tipo de examen</label>
								@if ($errors->has('tipr_nombre'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('tipr_nombre') }}</strong>
	                                </span>
	                            @endif
							</div>											
						</div>						
						<div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">assessment</i>
                                <select name="exa_id">
                                	<option value="" selected="" disabled="">Selecciona examen</option>
                                    <option value="Pastilla">Pastilla</option>
                                    <option value="Vacuna">Vacuna</option>
                                    <option value="Gotas">Gotas</option>
                                    <option value="Ungüento">Ungüento</option>
                                </select>
                                <label for="">Selecciona examen</label>
                            </div>                            
                        </div>                        
						<div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">assessment</i>
                                <select name="tipe_estado">                                	
                                    <option value="R" selected="">Revisado</option>
                                    <option value="N">No revisado</option>
                                </select>
                                <label for="">Selecciona examen</label>
                            </div>                            
                        </div>
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