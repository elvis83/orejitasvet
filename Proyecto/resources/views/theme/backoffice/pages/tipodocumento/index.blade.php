@extends('theme.backoffice.layouts.admin')

@section('title', 'Orejitas Vet')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.tipodocumento.index') }}">Documentos de Identidad</a></li>
@endsection

@section('dropdown_settings')
	<li><a href="{{ route('backoffice.tipodocumento.create') }}" class="grey-text text-darken-2">Crear Documento</a></li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Documentos de Identidad</p>
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
									<th>Abreviatura</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>

							@foreach($tipodocumentos as $tipodocumento)
								<tr>
									<td><a href="{{ route('backoffice.tipodocumento.show',$tipodocumento) }}">{{ $tipodocumento->tipd_nombre }}</a></td>
									<td>{{ $tipodocumento->tipd_abreviatura }}</td>
									<th><a href="{{ route('backoffice.tipodocumento.edit',$tipodocumento) }}">Editar</a></th>
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