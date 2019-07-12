@extends('theme.backoffice.layouts.admin')

@section('title', 'Detalle de Receta')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.recetadetalle.index') }}" class="active">Detalle de Receta</a></li>
@endsection

@section('content')
	
	<div class="section">
		<p class="caption">Introduce los datos de la receta.</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
					<span class="card-title">Detalle de Receta</span>
					<div class="row">
					<form class="col s12" method="post" action="{{ route('backoffice.recetadetalle.store') }}">
						
						{{ csrf_field() }}
						
						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix">healing</i>
								<input id="dia_trat" type="text" name="dia_trat" autofocus="">
								<label for="dia_trat">Tratamiento</label>
								@if ($errors->has('dia_trat'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('dia_trat') }}</strong>
	                                </span>
	                            @endif
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix">speaker_notes</i>
								<textarea id="dia_obs" class="materialize-textarea" name="dia_obs"></textarea>
								<label for="dia_obs">Observaciones</label>
								@if ($errors->has('dia_obs'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('dia_obs') }}</strong>
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