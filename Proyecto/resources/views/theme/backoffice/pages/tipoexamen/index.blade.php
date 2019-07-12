@extends('theme.backoffice.layouts.admin')

@section('title', 'Tipos de Exámenes')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.tipoexamen.index') }}">Tipos de Exámenes</a></li>
@endsection

@section('dropdown_settings')
	<li><a href="{{ route('backoffice.tipoexamen.create') }}" class="grey-text text-darken-2"><i class="material-icons">healing</i>Crear tipo de examen</a></li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Tipos de Exámenes</p>
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
									<th>Estado</th>
									<th>Examen</th>
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