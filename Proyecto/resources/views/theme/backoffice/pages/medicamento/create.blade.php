@extends('theme.backoffice.layouts.admin')

@section('title', 'Crear medicamento')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.medicamento.index') }}">Medicamentos</a></li>
	<li class="active">Crear medicamento</li>
@endsection

@section('content')
	
	<div class="section">
		<p class="caption">Introduce los datos de las medicamento.</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
					<span class="card-title">Crear medicamento</span>
					<div class="row">
					<form class="col s12" method="post" action="{{ route('backoffice.medicamento.store') }}">
						
						{{ csrf_field() }}
						
						<div class="row">
							<div class="input-field col s6">
								<i class="material-icons prefix">healing</i>
								<input id="medi_nombre" type="text" name="medi_nombre" autofocus="">
								<label for="medi_nombre">Nombre del medicamento</label>
								@if ($errors->has('medi_nombre'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('medi_nombre') }}</strong>
	                                </span>
	                            @endif
							</div>
							<div class="input-field col s6">
								<i class="material-icons prefix">speaker_notes</i>
								<textarea id="medi_desc" class="materialize-textarea" name="medi_desc"></textarea>
								<label for="medi_desc">Descripción del medicamento</label>
								@if ($errors->has('medi_desc'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('medi_desc') }}</strong>
	                                </span>
	                            @endif
							</div>					
						</div>						
						<div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">assessment</i>
                                <select name="medi_pres">
                                	<option value="" selected="" disabled="">Selecciona presentación</option>
                                    <option value="Pastilla">Pastilla</option>
                                    <option value="Vacuna">Vacuna</option>
                                    <option value="Gotas">Gotas</option>
                                    <option value="Ungüento">Ungüento</option>
                                </select>
                                <label for="medi_pres">Selecciona presentación</label>
                            </div>
                            <div class="input-field col s6">
								<i class="material-icons prefix">filter_9_plus</i>
								<input id="medi_stock" type="number" name="medi_stock">
								<label for="medi_stock">Stock</label>
								@if ($errors->has('medi_stock'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('medi_stock') }}</strong>
	                                </span>
	                            @endif
							</div>
                        </div>                        
						<div class="row">
							<div class="input-field col s4">
                                <i class="material-icons prefix">today</i>
								<input id="medi_fecven" type="date" name="medi_fecven">
								@if ($errors->has('medi_fecven'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('medi_fecven') }}</strong>
	                                </span>
	                            @endif
                            </div>
                            <div class="input-field col s4">
                                <i class="material-icons prefix">check</i>
                                <select name="medi_estado">
                                    <option value="A" selected="">Activo</option>
                                    <option value="B">Descontinuado</option>
                                </select>
                                <label for="medi_estado">Selecciona estado</label>
                            </div>
                            <div class="input-field col s4">
								<i class="material-icons prefix">attach_money</i>
								<input id="medi_precio" type="number" name="medi_precio">
								<label for="medi_precio">Precio</label>
								@if ($errors->has('medi_precio'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('medi_precio') }}</strong>
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