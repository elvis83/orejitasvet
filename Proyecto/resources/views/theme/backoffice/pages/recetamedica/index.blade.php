@extends('theme.backoffice.layouts.admin')

@section('title', 'Recetas Médicas')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.recetamedica.index') }}">Recetas Médicas</a></li>
@endsection

@section('dropdown_settings')
	<li><a href="{{ route('backoffice.recetamedica.create') }}" class="grey-text text-darken-2"><i class="material-icons">healing</i>Crear receta médica</a></li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Recetas Médicas</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12">
					<div class="card">
					<div class="card-content">
						<table class="striped responsive-table">
							<thead>
								<tr>
									<th>Nro. de Receta</th>
									<th>Fecha de Expedición</th>
									<th>Fecha de Caducidad</th>									
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td></a></td>
									<td></td>
									<td></td>
									<td></td>
									<td><a href="" title="Editar">
											<i class="material-icons">border_color</i>
										</a>
										<a href="{{ route('backoffice.recetadetalle.create') }}" title="Asignar detalles">
											<i class="material-icons">add_to_photos</i>
										</a>
									</td>
								</tr>							
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