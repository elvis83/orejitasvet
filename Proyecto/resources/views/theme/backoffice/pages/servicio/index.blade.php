@extends('theme.backoffice.layouts.admin')

@section('title', 'Servicio')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.servicio.index') }}">Servicio</a></li>
@endsection

@section('dropdown_settings')
	<li><a href="{{ route('backoffice.servicio.create') }}" class="grey-text text-darken-2"><i class="material-icons">healing</i>Crear servicio</a></li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Servicio</p>
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
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach($servicios as $servicio)
								<tr>
									<td><a href="{{ route('backoffice.servicio.show',$servicio) }}">{{ $servicio->ser_nombre }}</a></td>
									<th><a href="{{ route('backoffice.servicio.edit',$servicio) }}">Editar</a></th>
								</tr>
							@endforeach							
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