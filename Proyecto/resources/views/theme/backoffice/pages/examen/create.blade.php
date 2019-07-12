@extends('theme.backoffice.layouts.admin')

@section('title', 'Crear examen')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.examen.index') }}">Exámenes</a></li>
	<li class="active">Crear examen</li>
@endsection

@section('content')
	
	<div class="section">
		<p class="caption">Introduce los datos del examen.</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
					<span class="card-title">Crear examen</span>
					<div class="row">
					<form class="col s12" method="post" action="{{ route('backoffice.examen.store') }}">
						
						{{ csrf_field() }}
						
						<div class="row">
							<div class="input-field col s6">
								<i class="material-icons prefix">healing</i>
								<input id="ser_id" type="text" name="ser_id" disabled="">
								<label for="ser_id">Nombre del servicio</label>
								@if ($errors->has('ser_id'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('ser_id') }}</strong>
	                                </span>
	                            @endif
							</div>
							<div class="input-field col s6">
								<i class="material-icons prefix">speaker_notes</i>
								<input id="tips_id" type="text" name="tips_id" disabled="">
								<label for="tips_id">Tipo de servicio</label>
								@if ($errors->has('tips_id'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('tips_id') }}</strong>
	                                </span>
	                            @endif
							</div>					
						</div>						
						<div class="row">
                            <div class="input-field col s4">
								<i class="material-icons prefix">filter_9_plus</i>
								<input id="exa_temp" type="number" name="exa_temp">
								<label for="exa_temp">Temperatura</label>
								@if ($errors->has('exa_temp'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('exa_temp') }}</strong>
	                                </span>
	                            @endif
							</div>
                            <div class="input-field col s4">
								<i class="material-icons prefix">filter_9_plus</i>
								<input id="exa_peso" type="number" name="exa_peso">
								<label for="exa_peso">Peso</label>
								@if ($errors->has('exa_peso'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('exa_peso') }}</strong>
	                                </span>
	                            @endif
							</div>
							<div class="input-field col s4">
								<i class="material-icons prefix">filter_9_plus</i>
								<input id="exa_pulso" type="number" name="exa_pulso">
								<label for="exa_pulso">Pulso</label>
								@if ($errors->has('exa_pulso'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('exa_pulso') }}</strong>
	                                </span>
	                            @endif
							</div>
                        </div>                        
						<div class="row">
                            <div class="input-field col s4">
								<i class="material-icons prefix">filter_9_plus</i>
								<input id="exa_resp" type="number" name="exa_resp">
								<label for="exa_resp">Resiración</label>
								@if ($errors->has('exa_resp'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('exa_resp') }}</strong>
	                                </span>
	                            @endif
							</div>
                            <div class="input-field col s8">
								<i class="material-icons prefix">filter_9_plus</i>
								<textarea id="exa_anom" class="materialize-textarea" name="exa_anom"></textarea>
								<label for="exa_anom">Anomalias</label>
								@if ($errors->has('exa_anom'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('exa_anom') }}</strong>
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