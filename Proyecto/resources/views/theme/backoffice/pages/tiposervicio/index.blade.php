@extends('theme.backoffice.layouts.admin')

@section('title', 'Tipos de Servicios')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.tiposervicio.index') }}">Tipos de Servicios</a></li>
@endsection

@section('dropdown_settings')
	<li><a href="{{ route('backoffice.tiposervicio.create') }}" class="grey-text text-darken-2"><i class="material-icons">healing</i>Crear tipo de servicio</a></li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Tipos de Servicios</p>
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
								@foreach($tiposervicios as $tiposervicio)
								<tr>
									<td><a href="{{ route('backoffice.tiposervicio.show',$tiposervicio) }}">{{ $tiposervicio->tips_desc }}</a></td>
									<td>{{ $tiposervicio->tips_costo }}</a></td>
									<td>
										@foreach($servicios as $servicio)
	                                    	@if($servicio->id==$tiposervicio['ser_id'])
	                                        	{{ $servicio->ser_nombre }}
	                                        @endif
                                    @endforeach
									</td>
									<th><a href="{{ route('backoffice.tiposervicio.edit',$tiposervicio) }}">Editar</a></th>
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