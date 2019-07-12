@extends('theme.backoffice.layouts.admin')

@section('title', 'Mascotas')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.pet.index') }}">Mascotas</a></li>
@endsection

@section('dropdown_settings')
	<li><a href="{{ route('backoffice.pet.create') }}" class="grey-text text-darken-2"><i class="material-icons">pets</i>Crear mascota</a></li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Mascotas</p>
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
									<th>Raza</th>
									<th>Edad</th>
									<th>Sexo</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach($pets as $pet)
									<tr>
										<td><a href="{{ route('backoffice.pet.show',$pet) }}">{{ $pet->mas_nombre }}</a></td>
										<td>{{ $pet->mas_raza }}</td>
										<td>{{ $pet->agepet() }}</td>
										<td>
											@if($pet->mas_sexo=='M')
												Macho
											@elseif($pet->mas_sexo=='H')
												Hembra
											@endif
										</td>										
										<th><a href="{{ route('backoffice.pet.edit',$pet) }}">Editar</a></th>
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