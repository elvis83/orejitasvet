@extends('theme.backoffice.layouts.admin')

@section('title', $insumo->ins_desc)

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.insumo.index') }}">Insumos</a></li>
	<li>{{ $insumo->ins_desc }}</li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Insumo: </strong>{{ $insumo->ins_desc }}</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
						<span class="card-title">Código: {{ $insumo->id }}</span>
						<p><strong>Descripción: </strong>{{ $insumo->ins_desc }}</p>
						<p><strong>Unidad de Medida: </strong>{{ $insumo->ins_uni }}</p>
						<p><strong>Stock: </strong>{{ $insumo->ins_stock }}</p>
						<p><strong>Fecha de Vencimiento: </strong>{{ \Carbon\Carbon::parse($insumo->ins_fecven)->format('d/m/Y') }}</p>
						<p><strong>Estado: </strong>
							@if($insumo->ins_estado=='D')
								Disponible
							@elseif($insumo->ins_estado=='F')
								Faltante
							@endif
						</p>
					</div>
					<div class="card-action">
						<a href="{{ route('backoffice.insumo.edit', $insumo) }}">EDITAR</a>
						<a href="#" style="color: red;" onclick="enviar_formulario()">ELIMINAR</a>
					</div>
					</div>
				</div>
			</div>
	    </div>
	</div>
	<form method="post" action="{{ route('backoffice.insumo.destroy', $insumo) }}" name="delete_form">
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