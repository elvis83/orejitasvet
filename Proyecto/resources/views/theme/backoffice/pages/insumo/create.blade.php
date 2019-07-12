@extends('theme.backoffice.layouts.admin')

@section('title', 'Crear insumo')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.insumo.index') }}">Insumos</a></li>
	<li class="active">Crear insumo</li>
@endsection

@section('content')
	
	<div class="section">
		<p class="caption">Introduce los datos de las insumo.</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
					<span class="card-title">Crear insumo</span>
					<div class="row">
					<form class="col s12" method="post" action="{{ route('backoffice.insumo.store') }}">
						
						{{ csrf_field() }}
						
						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix">colorize</i>
								<input id="ins_desc" type="text" name="ins_desc" autofocus="">
								<label for="ins_desc">Nombre del insumo</label>
								@if ($errors->has('ins_desc'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('ins_desc') }}</strong>
	                                </span>
	                            @endif
							</div>						
						</div>
						<div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">assessment</i>
                                <select name="ins_uni">
                                	<option value="" selected="" disabled="">Selecciona unidad</option>
                                    <option value="Unidad">Unidad</option>
                                    <option value="Sobre">Sobre</option>
                                </select>
                                <label for="">Selecciona unidad de medida</label>
                            </div>
                            <div class="input-field col s6">
								<i class="material-icons prefix">filter_9_plus</i>
								<input id="ins_stock" type="number" name="ins_stock">
								<label for="ins_stock">Stock</label>
								@if ($errors->has('ins_stock'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('ins_stock') }}</strong>
	                                </span>
	                            @endif
							</div>
                        </div>                        
						<div class="row">							
							<div class="input-field col s6">
                                <i class="material-icons prefix">today</i>
								<input id="ins_fecven" type="date" name="ins_fecven">
								@if ($errors->has('ins_fecven'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('ins_fecven') }}</strong>
	                                </span>
	                            @endif
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">check</i>
                                <select name="ins_estado">
                                    <option value="D" selected="">Disponible</option>
                                    <option value="F">Faltante</option>
                                </select>
                                <label for="">Selecciona estado</label>
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
	<script type="text/javascript" src="{{ asset('assets/frontoffice/plugins/pickadate/picker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontoffice/plugins/pickadate/picker.date.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontoffice/plugins/pickadate/picker.time.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontoffice/plugins/pickadate/legacy.js') }}"></script>
    <script type="text/javascript">
        
        var input_date = $('.datepicker').pickadate({
            min: false

        });
        var date_picker = input_date.pickadate('picker');
        
        $('.datepicker').on('mousedown',function(event){ event.preventDefault(); });

    </script>
@endsection