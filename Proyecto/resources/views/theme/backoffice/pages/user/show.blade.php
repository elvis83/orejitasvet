@extends('theme.backoffice.layouts.admin')

@section('title', 'Orejitas Vet')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.user.index') }}">Usuarios del Sistema</a></li>
	<li>{{ $user->name }}</li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Usuario: </strong>{{ $user->name }}</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8">
					<div class="card">
					<div class="card-content">
						<span class="card-title">{{ $user->name }}</span>
						<h4>Roles:</h4>
						<ul>
							@foreach($user->roles as $role)
								<li>{{ $role->name }}</li>
							@endforeach
						</ul>
					</div>
					<div class="card-action">
						<a href="{{ route('backoffice.user.edit', $user) }}">EDITAR</a>
						<a href="#" style="color: red;" onclick="enviar_formulario()">ELIMINAR</a>
					</div>
					</div>
				</div>
				<div class="col s12 m4">
					@include('theme.backoffice.pages.user.includes.user_nav')
				</div>
			</div>
	    </div>
	</div>
	<form method="post" action="{{ route('backoffice.user.destroy', $user) }}" name="delete_form">
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
            title: "¿Desea eliminar este usuario?",
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