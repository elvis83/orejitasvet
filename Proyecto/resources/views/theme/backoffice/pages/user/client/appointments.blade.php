@extends('theme.backoffice.layouts.admin')

@section('title', 'Citas de ' . $user->name )

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.user.index') }}">Usuarios del Sistema</a></li>
	<li><a href="{{ route('backoffice.user.show', $user) }}">{{ $user->name }}</a></li>
	<li>{{ 'Citas de ' . $user->name }}</li>
@endsection

@section('dropdown_settings')
	<li><a href="{{ route('backoffice.client.schedule', $user) }}" class="grey-text text-darken-2">Agendar cita</a></li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>{{ 'Citas de ' . $user->name }}</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8">
					<div class="card">
					<div class="card-content">
						<table class="striped responsive-table">
							<thead>
								<tr>
									<th>ID</th>
									<th>Día</th>
									<th>Hora</th>
									<th>Estado</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>754</th>
									<th>25/10/2019</th>
									<th>15:00</th>
									<th>En progreso</th>
									<th>
										<a href="{{ route('backoffice.user.edit', $user) }}" title="Editar">
											<i class="material-icons">border_color</i>
										</a>
									</th>
								</tr>						
							</tbody>
						</table>
					</div>
					</div>
				</div>
				<div class="col s12 m4">
					@include('theme.backoffice.pages.user.includes.user_nav')
				</div>
			</div>
		</div>
	</div>
@endsection

@section('foot')
@endsection