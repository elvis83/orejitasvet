@extends('theme.backoffice.layouts.admin')

@section('title', $medicamento->medi_nombre)

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.medicamento.index') }}">Medicamentos</a></li>
	<li>{{ $medicamento->medi_nombre }}</li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>medicamento: </strong>{{ $medicamento->medi_nombre }}</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
						<span class="card-title">Código: {{ $medicamento->id }}</span>
						<p><strong>Nombre: </strong>{{ $medicamento->medi_nombre }}</p>
						<p><strong>Descripción: </strong>{{ $medicamento->medi_desc }}</p>
						<p><strong>Presentación: </strong>{{ $medicamento->medi_pres }}</p>
						<p><strong>Stock: </strong>{{ $medicamento->medi_stock }}</p>
						<p><strong>Fecha de Vencimiento: </strong>{{ \Carbon\Carbon::parse($medicamento->medi_fecven)->format('d/m/Y') }}</p>
						<p><strong>Estado: </strong>
							@if($medicamento->medi_estado=='A')
								Activo
							@elseif($medicamento->medi_estado=='B')
								Descontinuado
							@endif
						</p>
						<p><strong>Precio: </strong>S/. {{ $medicamento->medi_precio }}</p>
					</div>
					<div class="card-action">
						<a href="{{ route('backoffice.medicamento.edit', $medicamento) }}">EDITAR</a>
						<a href="#" style="color: red;" onclick="enviar_formulario()">ELIMINAR</a>
					</div>
					</div>
				</div>
			</div>
	    </div>
	</div>
	<form method="post" action="{{ route('backoffice.medicamento.destroy', $medicamento) }}" name="delete_form">
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