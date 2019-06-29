@extends('theme.backoffice.layouts.admin')

@section('title', 'Usuarios del Sistema')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.user.index') }}">Usuarios del Sistema</a></li>
@endsection

@section('dropdown_settings')
	<li><a href="{{ route('backoffice.user.create') }}" class="grey-text text-darken-2">Crear usuario</a></li>
	<li><a href="{{ route('backoffice.user.import') }}" class="grey-text text-darken-2">Importar usuarios</a></li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Usuarios del Sistema</p>
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
									<th>Edad</th>
									<th>Correo</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>

							@foreach($users as $user)
								<tr>
									<td><a href="{{ route('backoffice.user.show', $user) }}">{{ $user->name }}</a></td>
									<td>{{ $user->age() }}</td>
									<td>{{  $user->email }}</td>
									<td><a href="{{ route('backoffice.user.edit', $user) }}" title="Editar">
											<i class="material-icons">border_color</i>
										</a>
									</td>
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