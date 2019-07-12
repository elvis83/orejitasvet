@extends('theme.backoffice.layouts.admin')

@section('title', 'Editar cita de ' . $user->name )

@section('head')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontoffice/plugins/pickadate/themes/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontoffice/plugins/pickadate/themes/default.date.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontoffice/plugins/pickadate/themes/default.time.css') }}">
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.user.index') }}">Usuarios del Sistema</a></li>
	<li><a href="{{ route('backoffice.user.show', $user) }}">{{ $user->name }}</a></li>
	<li><a href="{{ route('backoffice.client.appointments', $user) }}">{{ 'Citas de ' . $user->name }}</a></li>
	<li><a href="">Editar cita</a></li>
@endsection

@section('dropdown_settings')
	<li><a href="{{ route('backoffice.client.schedule', $user) }}" class="grey-text text-darken-2">Agendar nueva cita</a></li>
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
							
							@include('theme.includes.user.client.schedule_form',[
								'route' => route('backoffice.client.appointment.update', [$user, $appointment]),
							])

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
	@include('theme.includes.user.client.schedule_foot',[
		'material_select' => 'material_select'
	])
@endsection