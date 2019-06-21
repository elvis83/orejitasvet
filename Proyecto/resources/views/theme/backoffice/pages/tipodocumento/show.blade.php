@extends('theme.backoffice.layouts.admin')

@section('title', 'Orejitas Vet')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.tipodocumento.index') }}">Documentos de Identidad</a></li>
	<li>{{ $tipodocumento->tipd_nombre }}</li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Documento de Identidad: </strong>{{ $tipodocumento->tipd_nombre }}</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
						<span class="card-title">Código: {{ $tipodocumento->id }}</span>
						<p><strong>Nombre: </strong>{{ $tipodocumento->tipd_nombre }}</p>
						<p><strong>Abreviatura: </strong>{{ $tipodocumento->tipd_abreviatura }}</p>
					</div>
					<div class="card-action">
						<a href="{{ route('backoffice.tipodocumento.edit', $tipodocumento) }}">EDITAR</a>
						<a href="#" style="color: red;" onclick="enviar_formulario()">ELIMINAR</a>
					</div>
					</div>
				</div>
			</div>
	    </div>
	</div>
	<form method="post" action="{{ route('backoffice.tipodocumento.destroy', $tipodocumento) }}" name="delete_form">
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