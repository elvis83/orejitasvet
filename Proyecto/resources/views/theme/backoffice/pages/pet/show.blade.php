@extends('theme.backoffice.layouts.admin')

@section('title', $pet->mas_nombre)

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.pet.index') }}">Mascotas</a></li>
	<li>{{ $pet->mas_nombre }}</li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Mascota: </strong>{{ $pet->mas_nombre }}</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
						<span class="card-title">Código: {{ $pet->id }}</span>
						<p><strong>Nombre: </strong>{{ $pet->mas_nombre }}</p>
						<p><strong>Raza: </strong>{{ $pet->mas_raza }}</p>
						<p><strong>Sexo: </strong>
							@if($pet->mas_sexo=='M')
								Macho
							@elseif($pet->mas_sexo=='H')
								Hembra
							@endif
						</p>
						<p><strong>Alergía: </strong>
							@if(is_null($pet->mas_alergia))
								Ninguna
							@else
								{{ $pet->mas_alergia }}
							@endif
						</p>
						<p><strong>Fecha de Nacimiento: </strong>{{ \Carbon\Carbon::parse($pet->mas_fecnac)->format('d/m/Y') }}</p>
						<p><strong>Estado: </strong>
							@if($pet->mas_estado=='A')
								Activo
							@elseif($pet->mas_estado=='I')
								Inactivo
							@endif
						</p>
					</div>
					<div class="card-action">
						<a href="{{ route('backoffice.pet.edit', $pet) }}">EDITAR</a>
						<a href="#" style="color: red;" onclick="enviar_formulario()">ELIMINAR</a>
					</div>
					</div>
				</div>
			</div>
	    </div>
	</div>
	<form method="post" action="{{ route('backoffice.pet.destroy', $pet) }}" name="delete_form">
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