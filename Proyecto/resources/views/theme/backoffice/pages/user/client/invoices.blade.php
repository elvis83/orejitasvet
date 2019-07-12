@extends('theme.backoffice.layouts.admin')

@section('title', 'Facturas de ' . $user->name )

@section('head')

@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.user.index') }}">Usuarios del Sistema</a></li>
	<li><a href="{{ route('backoffice.user.show', $user) }}">{{ $user->name }}</a></li>
	<li><a href="{{ route('backoffice.client.invoice', $user) }}">{{ 'Facturas de ' . $user->name }}</a></li>
@endsection

@section('dropdown_settings')
	<li><a href="{{ route('backoffice.client.schedule', $user) }}" class="grey-text text-darken-2">Agendar nueva cita</a></li>
	<li><a href="" class="grey-text text-darken-2">Añadir factura</a></li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>{{ 'Facturas de ' . $user->name }}</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8">
					<div class="card">
					<div class="card-content">

						@include('theme.includes.user.client.invoice_table')

					</div>
					</div>
				</div>
				<div class="col s12 m4">
					@include('theme.backoffice.pages.user.includes.user_nav')
				</div>
			</div>
		</div>

		@include('theme.includes.user.client.invoice_modal')

	</div>
@endsection

@section('foot')

	@include('theme.includes.user.client.invoice_foot')

@endsection