@extends('theme.backoffice.layouts.admin')

@section('title', 'Orejitas Vet')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.role.index') }}">Roles del Sistema</a></li>
	<li><a href="{{ route('backoffice.role.show', $permission->role) }}">Rol: {{ $permission->role->name }}</a></li>
	<li>{{ $permission->name }}</li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Permiso: </strong>{{ $permission->name }}</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
						<span class="card-title">{{ $permission->name }}</span>
						<p><strong>Slug: </strong>{{ $permission->slug }}</p>
						<p><strong>Descripción: </strong>{{ $permission->description }}</p>
					</div>
					<div class="card-action">
						<a href="{{ route('backoffice.permission.edit', $permission) }}">EDITAR</a>
						<a href="#" style="color: red;" onclick="enviar_formulario()">ELIMINAR</a>
					</div>
					</div>
				</div>
			</div>
	    </div>
	</div>
	<form method="post" action="{{ route('backoffice.permission.destroy', $permission) }}" name="delete_form">
		{{ csrf_field() }}
		{{ method_field('DELETE') }}
	</form>
@endsection

@section('foot')
	<script>
		function enviar_formulario()
		{
			swal({
            text: "Esta acción no se puede deshacer",
            title: "¿Desea eliminar registro?",
            icon: "warning",            
  			buttons: true,
  			confirmButtonColor: "#74DF00",
  		})

		.then((willDelete) => {
		if (willDelete) {
			document.delete_form.submit();
		}else {
			swal("Operacion cancelada", "No se ha eliminado registro");
		}
        });

		}
	</script>
@endsection