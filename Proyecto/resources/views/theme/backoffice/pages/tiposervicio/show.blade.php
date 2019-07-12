@extends('theme.backoffice.layouts.admin')

@section('title', $tiposervicio->tips_desc)

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.tiposervicio.index') }}">Tipos de Servicio</a></li>
	<li>{{ $tiposervicio->tips_desc }}</li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Tipos de servicio: </strong>{{ $tiposervicio->tips_desc }}</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
						<span class="card-title">Código: {{ $tiposervicio->id }}</span>
						<p><strong>Descripción: </strong>{{ $tiposervicio->tips_desc }}</p>
						<p><strong>Costo: </strong>S/. {{ $tiposervicio->tips_costo }}</p>
					</div>
					<div class="card-action">
						<a href="{{ route('backoffice.tiposervicio.edit', $tiposervicio) }}">EDITAR</a>
						<a href="#" style="color: red;" onclick="enviar_formulario()">ELIMINAR</a>
					</div>
					</div>
				</div>
			</div>
	    </div>
	</div>
	<form method="post" action="{{ route('backoffice.tiposervicio.destroy', $tiposervicio) }}" name="delete_form">
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