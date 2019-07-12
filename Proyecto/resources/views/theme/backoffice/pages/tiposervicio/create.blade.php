@extends('theme.backoffice.layouts.admin')

@section('title', 'Crear tipo de servicio')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.tiposervicio.index') }}">Tipos de Servicios</a></li>
	<li class="active">Crear tipo de servicio</li>
@endsection

@section('content')
	
	<div class="section">
		<p class="caption">Introduce los datos de las tipo de servicio.</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s6 offset-m3">
					<div class="card">
					<div class="card-content">
					<span class="card-title">Crear tipo de servicio</span>
					<div class="row">
					<form class="col s12" method="post" action="{{ route('backoffice.tiposervicio.store') }}">
						
						{{ csrf_field() }}
						
						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix">healing</i>
								<input id="tips_desc" type="text" name="tips_desc" autofocus="">
								<label for="tips_desc">Nombre del tipo de servicio</label>
								@if ($errors->has('tips_desc'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('tips_desc') }}</strong>
	                                </span>
	                            @endif
							</div>											
						</div>						
						<div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">assessment</i>
                                <select name="ser_id">
                                	<option value="" selected="" disabled="">Selecciona servicio</option>
                                    @foreach($servicios as $servicio)
										<option value="{{ $servicio->id }}">{{ $servicio->ser_nombre }}</option>
									@endforeach
                                </select>
                                <label for="">Selecciona servicio</label>
                            </div>                            
                        </div>                        
						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix">filter_9_plus</i>
								<input id="tips_costo" type="number" name="tips_costo">
								<label for="tips_costo">Costo</label>
								@if ($errors->has('tips_costo'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('tips_costo') }}</strong>
	                                </span>
	                            @endif
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