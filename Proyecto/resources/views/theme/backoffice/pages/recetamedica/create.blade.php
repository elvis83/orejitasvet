@extends('theme.backoffice.layouts.admin')

@section('title', 'Crear receta médica')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.recetamedica.index') }}">Recetas médicas</a></li>
	<li class="active">Crear receta médica</li>
@endsection

@section('content')
	
	<div class="section">
		<p class="caption">Introduce los datos de las receta médica.</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
					<span class="card-title">Crear receta médica</span>
					<div class="row">
					<form class="col s12" method="post" action="{{ route('backoffice.recetamedica.store') }}">
						
						{{ csrf_field() }}
						
						<div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">today</i>
                                <input id="rec_fecexp" type="text" name="rec_fecexp" class="datepicker" placeholder="Selecciona una fecha">
                                <label for="rec_fecexp">Fecha de Expidición</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">today</i>
                                <input id="rec_fecexp" type="text" name="rec_fecexp" class="datepicker" placeholder="Selecciona una fecha">
                                <label for="rec_fecexp">Fecha de Caducidad</label>
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
            min: true

        });
        var date_picker = input_date.pickadate('picker');
        
        var input_time = $('.timepicker').pickatime({
            min: 4
        });
        var time_picker = input_time.pickatime('picker');

        $('.datepicker').on('mousedown',function(event){ event.preventDefault(); });
        $('.timepicker').on('mousedown',function(event){ event.preventDefault(); });

    </script>
@endsection