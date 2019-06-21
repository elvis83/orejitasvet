@extends('theme.backoffice.layouts.admin')

@section('title', 'Orejitas Vet')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.role.index') }}">Roles del Sistema</a></li>
	<li>{{ $role->name }}</li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Rol: </strong>{{ $role->name }}</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
						<span class="card-title">Usuarios con el rol de: {{ $role->name }}</span>
						<p><strong>Slug: </strong>{{ $role->slug }}</p>
						<p><strong>Descripción: </strong>{{ $role->description }}</p>
					</div>
					<div class="card-action">
						<a href="{{ route('backoffice.role.edit', $role) }}">EDITAR</a>
						<a href="#" style="color: red;" onclick="enviar_formulario()">ELIMINAR</a>
					</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
						<div class="card-content">
							<span class="card-title">Permisos del rol: {{ $role->name }}</span>
							<table class="striped responsive-table">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Slug</th>
									<th>Descripci&oacute;n</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>

							@foreach($permissions as $permission)
								<tr>
									<td><a href="{{ route('backoffice.permission.show',$permission) }}">{{ $permission->name }}</a></td>
									<td>{{ $permission->slug }}</td>
									<td>{{ $permission->description }}</td>									
									<th><a href="{{ route('backoffice.permission.edit',$permission) }}">Editar</a></th>
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
	<form method="post" action="{{ route('backoffice.role.destroy', $role) }}" name="delete_form">
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
            title: "¿Desea eliminar este rol?",
            icon: "warning",            
  			buttons: true,
  			confirmButtonColor: "#74DF00",
  		})

		.then((willDelete) => {
		if (willDelete) {
			document.delete_form.submit();
		}else {
			swal("Operacion cancelada", "No se ha eliminado el rol");
		}
        });

		}
	</script>
@endsection