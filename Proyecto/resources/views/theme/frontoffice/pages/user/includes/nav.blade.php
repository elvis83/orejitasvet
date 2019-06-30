{{-- Menu Lateral --}}
<div class="col s12 m4">
	<div class="collection">
		<a 
			href="{{ route('frontoffice.user.profile') }}" 
			class="collection-item {!! active_class(route('frontoffice.user.profile')) !!}">
			Perfil
		</a>
		@if(auth()->user()->has_role(config('app.client_role')))
			<a 
				href="{{ route('frontoffice.client.schedule') }}" 
				class="collection-item {!! active_class(route('frontoffice.client.schedule')) !!}">
				Agendar Cita
			</a>
			<a 
				href="{{ route('frontoffice.client.appointments') }}" 
				class="collection-item {!! active_class(route('frontoffice.client.appointments')) !!}">
				Mis Citas
			</a>
			<a 
				href="{{ route('frontoffice.client.prescriptions') }}" 
				class="collection-item {!! active_class(route('frontoffice.client.prescriptions')) !!}">
				Recetas
			</a>
			<a 
				href="{{ route('frontoffice.client.invoices') }}" 
				class="collection-item {!! active_class(route('frontoffice.client.invoices')) !!}">
				Facturación
			</a>
		@endif
		
		<a 
			href="{{ route('frontoffice.user.edit', [auth()->user(), 'view=frontoffice']) }}" 
			class="collection-item {{ active_class(route('frontoffice.user.edit', auth()->user())) }}">
			Editar Perfil
		</a>
		<a 
			href="{{ route('frontoffice.user.edit_password') }}" 
			class="collection-item {{ active_class(route('frontoffice.user.edit_password')) }}">
			Modificar Contraseña
		</a>
	</div>
</div>