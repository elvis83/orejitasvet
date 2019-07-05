@extends('theme.backoffice.layouts.admin')

@section('title', 'Especialidades médicas')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.speciality.index') }}" class="active">Especialidades médicas</a></li>
@endsection

@section('dropdown_settings')
	<li><a href="{{ route('backoffice.speciality.create') }}" class="grey-text text-darken-2">Crear especilidad</a></li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Especialidades médicas</p>
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
									<th># de médicos</th>									
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>

							@foreach($specialities as $speciality)
								<tr>
									<td><a href="{{ route('backoffice.speciality.show',$speciality) }}">{{ $speciality->name }}</a></td>						
									<td>{{ $speciality->users->count() }}</td>
									<th><a href="{{ route('backoffice.speciality.edit',$speciality) }}">Editar</a></th>
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