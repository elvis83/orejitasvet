@extends('theme.backoffice.layouts.admin')

@section('title', 'Crear resultados')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.resultado.index') }}">Resultados</a></li>
	<li class="active">Crear resultados</li>
@endsection

@section('content')
	
	<div class="section">
		<p class="caption">Introduce los datos de los resultados.</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
					<span class="card-title">Crear resultado</span>
					<div class="row">
					<form class="col s12" method="post" action="{{ route('backoffice.resultado.store') }}">
						
						{{ csrf_field() }}
						
						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix">healing</i>
								<input id="res_anexo" type="text" name="res_anexo" autofocus="">
								<label for="res_anexo">Anexo</label>
								@if ($errors->has('res_anexo'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('res_anexo') }}</strong>
	                                </span>
	                            @endif
							</div>												
						</div>						
						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix">speaker_notes</i>
								<textarea id="res_obs1" class="materialize-textarea" name="res_obs1"></textarea>
								<label for="res_obs1">Observaciones</label>
								@if ($errors->has('res_obs1'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('res_obs1') }}</strong>
	                                </span>
	                            @endif
							</div>                            
                        </div>                        
						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix">speaker_notes</i>
								<textarea id="res_obs2" class="materialize-textarea" name="res_obs2"></textarea>
								<label for="res_obs2">Observaciones Adicionales</label>
								@if ($errors->has('res_obs2'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('res_obs2') }}</strong>
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