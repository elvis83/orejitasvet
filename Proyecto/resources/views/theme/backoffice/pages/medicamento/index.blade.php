@extends('theme.backoffice.layouts.admin')

@section('title', 'Medicamento')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.medicamento.index') }}">Medicamento</a></li>
@endsection

@section('dropdown_settings')
	<li><a href="{{ route('backoffice.medicamento.create') }}" class="grey-text text-darken-2"><i class="material-icons">healing</i>Crear medicamento</a></li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Medicamento</p>
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
									<th>Presentación</th>
									<th>Stock</th>
									<th>Fecha Vencimiento</th>
									<th>Estado</th>
									<th>Precio</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach($medicamentos as $medicamento)
									<tr>
										<td><a href="{{ route('backoffice.medicamento.show',$medicamento) }}">{{ $medicamento->medi_nombre }}</a></td>
										<td>{{ $medicamento->medi_pres }}</td>
										<td>{{ $medicamento->medi_stock }}</td>
										<td>{{ \Carbon\Carbon::parse($medicamento->medi_fecven)->format('d/m/Y') }}</td>
										<td>
											@if($medicamento->medi_estado=='A')
												Activo
											@elseif($medicamento->medi_estado=='B')
												Descontinuado
											@endif
										</td>
										<td>S/. {{ $medicamento->medi_precio }}</td>
										<th><a href="{{ route('backoffice.medicamento.edit',$medicamento) }}">Editar</a></th>
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