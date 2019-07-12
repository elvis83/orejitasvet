@extends('theme.backoffice.layouts.admin')

@section('title', $servicio->ser_nombre)

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.servicio.index') }}">Servicios</a></li>
	<li>{{ $servicio->ser_nombre }}</li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Servicios médicos: </strong>{{ $servicio->ser_nombre }}</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
						<span class="card-title">Código: {{ $servicio->id }}</span>
						<p><strong>Nombre: </strong>{{ $servicio->ser_nombre }}</p>						
					</div>
					<div class="card-action">
						<a href="{{ route('backoffice.servicio.edit', $servicio) }}">EDITAR</a>
						<a href="#" style="color: red;" onclick="enviar_formulario()">ELIMINAR</a>
					</div>
					</div>
				</div>
			</div>
	    </div>
	</div>
	<form method="post" action="{{ route('backoffice.servicio.destroy', $servicio) }}" name="delete_form">
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
            title: "¿Desea eliminar el registro?",
            icon: "warning",            
  			buttons: true,
  			confirmButtonColor: "#74DF00",
  		})

		.then((willDelete) => {
		if (willDelete) {
			document.delete_form.submit();
		}else {
			swal("Operacion cancelada", "Registro no eliminado","success");
		}
        });

		}
	</script>
@endsection