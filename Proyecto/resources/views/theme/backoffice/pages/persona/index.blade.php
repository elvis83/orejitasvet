@extends('theme.backoffice.layouts.admin')

@section('title', 'Orejitas Vet')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.persona.index') }}">Datos Personales</a></li>
@endsection

@section('dropdown_settings')
	<li><a href="{{ route('backoffice.persona.create') }}" class="grey-text text-darken-2">Crear Persona</a></li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Datos Personales</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12">
					<div class="card">
					<div class="card-content">
						<table class="striped responsive-table">
							<thead>
								<tr>
									<th>Cliente</th>									
									<th>Nro. Documento</th>
									<th>Dirección</th>
									<th>Teléfono / Celular</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>

							@foreach($personas as $persona)
								<tr>
									<td>
										<a href="{{ route('backoffice.persona.show',$persona) }}">
											{{ $persona->per_apepat }} {{ $persona->per_apepat }}, {{ $persona->per_nombres }}
										</a>
									</td>
									<td>{{ $persona->per_nrodoc }}</td>
									<td>{{ $persona->per_dir }}</td>
									<td>
										@if( $persona->per_tel == '')
											Ninguno
										@else
											{{ $persona->per_tel }} /
										@endif
										@if( $persona->per_cel == '')
											Ninguno
										@else
											{{ $persona->per_cel }}
										@endif
									</td>
									<th><a href="{{ route('backoffice.persona.edit',$persona) }}">Editar</a></th>
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