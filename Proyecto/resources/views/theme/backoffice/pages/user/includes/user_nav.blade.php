<div class="collection">
	{{-- <a href="#!" class="collection-item active">Alvin</a> --}}
	<a href="{{ route('backoffice.user.show', $user) }}" class="collection-item active">{{ $user->name }}</a>
	@if(Auth::user()->has_any_role([
			config('app.admin_role'),
			config('app.assistant_role'),
			config('app.doctor_role')
		]))
		@if($user->has_role(config('app.client_role')))
			<a href="{{ route('backoffice.client.schedule', $user) }}" class="collection-item">Agendar cita</a>
			<a href="{{ route('backoffice.client.appointments', $user) }}" class="collection-item">Citas</a>
			<a href="{{ route('backoffice.client.invoices', $user) }}" class="collection-item">Facturas</a>
		@endif
	@endif
	@if(Auth::user()->has_role(config('app.admin_role')))
		<a href="{{ route('backoffice.user.assign_role', $user) }}" class="collection-item">Asignar Roles</a>
		<a href="{{ route('backoffice.user.assign_permission', $user) }}" class="collection-item">Asignar Permisos</a>
		@if($user->has_role(config('app.doctor_role')))
			<a href="{{ route('backoffice.user.assign_speciality', $user) }}" class="collection-item">Asignar Especialidad</a>
		@endif
	@endif
</div>