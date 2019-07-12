@extends('theme.backoffice.layouts.admin')

@section('title', 'Turnos de Atención')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.turnomedico.index') }}">Tipos de Servicios</a></li>
@endsection

@section('dropdown_settings')
	<li><a href="{{ route('backoffice.turnomedico.create') }}" class="grey-text text-darken-2"><i class="material-icons">healing</i>Crear turno médico</a></li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Turnos de Atención</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12">
					<div class="card">
					<div class="card-content">
						<table class="striped responsive-table">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Costo</th>
									<th>Servicio Relacionado</th>									
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
															
							</tbody>
						</table>
					</div>
					</div>
				</div>
			</div>
	    </div>
	</div>
@endsection

@section('foot')
@endsection