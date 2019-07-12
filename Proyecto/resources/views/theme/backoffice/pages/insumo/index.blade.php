@extends('theme.backoffice.layouts.admin')

@section('title', 'Insumos')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.insumo.index') }}">Insumos</a></li>
@endsection

@section('dropdown_settings')
	<li><a href="{{ route('backoffice.insumo.create') }}" class="grey-text text-darken-2"><i class="material-icons">format_color_fill</i>Crear insumo</a></li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Insumos</p>
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
									<th>Uni. Medida</th>
									<th>Stock</th>
									<th>Fecha Vencimiento</th>
									<th>Estado</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach($insumos as $insumo)
									<tr>
										<td><a href="{{ route('backoffice.insumo.show',$insumo) }}">{{ $insumo->ins_desc }}</a></td>
										<td>{{ $insumo->ins_uni }}</td>
										<td>{{ $insumo->ins_stock }}</td>
										<td>{{ \Carbon\Carbon::parse($insumo->ins_fecven)->format('d/m/Y') }}</td>
										<td>
											@if($insumo->ins_estado=='D')
												Disponible
											@elseif($insumo->ins_estado=='F')
												Faltante
											@endif
										</td>
										<th><a href="{{ route('backoffice.insumo.edit',$insumo) }}">Editar</a></th>
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