@extends('theme.backoffice.layouts.admin')

@section('title', 'Editar mascota')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.pet.index') }}">Mascotas</a></li>
	<li class="active">Editar mascota</li>
@endsection

@section('content')
	
	<div class="section">
		<p class="caption">Introduce los datos de la mascota.</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
					<span class="card-title">Editar mascota</span>
					<div class="row">
					<form class="col s12" method="post" action="{{ route('backoffice.pet.update', $pet) }}">
						
						{{ csrf_field() }}
						{{ method_field('PUT') }}

						<div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">people</i>
                                <select id="user_id" name="user_id">
                                    <option value="{{ $pet->user->id }}" selected="">{{ $pet->user->name }}</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <label for="user_id">Selecciona un cliente</label>
                            </div>
                        </div>

						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix">pets</i>
								<input id="mas_nombre" type="text" name="mas_nombre" value="{{ $pet->mas_nombre }}">
								<label for="mas_nombre">Nombre de la mascota</label>
								@if ($errors->has('mas_nombre'))
	                                <span class="invalid-feedback" pet="alert">
	                                    <strong style="color: red;">{{ $errors->first('mas_nombre') }}</strong>
	                                </span>
	                            @endif
							</div>						
						</div>
						<div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">chrome_reader_mode</i>
                                <select name="mas_tipo">
                                	@switch($pet->mas_tipo)
									    @case('Canino')
									        <option value="Canino" selected="">Canino</option>
		                                    <option value="Felino">Felino</option>
		                                    <option value="Ave">Ave</option>
									        @break
									    @case('Felino')
									        <option value="Canino">Canino</option>
		                                    <option value="Felino" selected="">Felino</option>
		                                    <option value="Ave">Ave</option>
									        @break
									    @case('Ave')
									        <option value="Canino">Canino</option>
		                                    <option value="Felino">Felino</option>
		                                    <option value="Ave" selected="">Ave</option>
									        @break									    
									    @default									        
									@endswitch                                    
                                </select>
                                <label for="mas_tipo">Selecciona un tipo</label>
                            </div>
                        </div>
                        <div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix">adb</i>
								<input id="mas_raza" type="text" name="mas_raza" value="{{ $pet->mas_raza }}">
								<label for="mas_raza">Raza</label>
								@if ($errors->has('mas_raza'))
	                                <span class="invalid-feedback" pet="alert">
	                                    <strong style="color: red;">{{ $errors->first('mas_raza') }}</strong>
	                                </span>
	                            @endif
							</div>
						</div>
						<div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">people</i>
                                <select name="mas_sexo">
                                	@switch($pet->mas_sexo)
									    @case('M')
									        <option value="M" selected="">Macho</option>
                                    		<option value="H">Hembra</option>
									        @break
									    @case('H')
									        <option value="M">Macho</option>
                                    		<option value="H" selected="">Hembra</option>
									        @break									    						    
									    @default									        
									@endswitch
                                </select>
                                <label for="">Sexo</label>
                            </div>
                        </div>
                        <div class="row">
							<div class="input-field col s6">
								<i class="material-icons prefix">local_hospital</i>
								<input id="mas_gs" type="text" name="mas_gs" value="{{ $pet->mas_gs }}">
								<label for="mas_gs">Grupo sanguíneo</label>
								@if ($errors->has('mas_gs'))
	                                <span class="invalid-feedback" pet="alert">
	                                    <strong style="color: red;">{{ $errors->first('mas_gs') }}</strong>
	                                </span>
	                            @endif
							</div>
							<div class="input-field col s6">
								<i class="material-icons prefix">local_hospital</i>
								<input id="mas_alergia" type="text" name="mas_alergia" value="{{ $pet->mas_alergia }}">
								<label for="mas_alergia">Alergías</label>
								@if ($errors->has('mas_alergia'))
	                                <span class="invalid-feedback" pet="alert">
	                                    <strong style="color: red;">{{ $errors->first('mas_alergia') }}</strong>
	                                </span>
	                            @endif
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m6">
                                <i class="material-icons prefix">today</i>
								<input id="mas_fecnac" type="date" name="mas_fecnac" value="{{ $pet->mas_fecnac }}">
								@if ($errors->has('mas_fecnac'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('mas_fecnac') }}</strong>
	                                </span>
	                            @endif
                            </div>
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">color_lens</i>
								<input id="mas_color" type="text" name="mas_color" value="{{ $pet->mas_color }}">
								<label for="mas_color">Color</label>
								@if ($errors->has('mas_color'))
	                                <span class="invalid-feedback" pet="alert">
	                                    <strong style="color: red;">{{ $errors->first('mas_color') }}</strong>
	                                </span>
	                            @endif
							</div>
						</div>
						<div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">chrome_reader_mode</i>
                                <select name="mas_estado">
                                	@switch($pet->mas_estado)
									    @case('A')
									        <option value="A" selected="">Activo</option>
                                    		<option value="I">Inactivo</option>
									        @break
									    @case('I')
									        <option value="A">Activo</option>
                                    		<option value="I" selected="">Inactivo</option>
									        @break									    						    
									    @default									        
									@endswitch                                    
                                </select>
                                <label for="mas_estado">Selecciona estado</label>
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