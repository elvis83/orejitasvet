@extends('theme.backoffice.layouts.admin')

@section('title', 'Orejitas Vet')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.persona.index') }}">Datos Personales</a></li>
	<li>{{ $persona->per_apepat }}  {{ $persona->per_apemat }}, {{ $persona->per_nombres }}</li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Datos Personales: </strong>{{ $persona->per_apepat }}  {{ $persona->per_apemat }}, {{ $persona->per_nombres }}</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
						<p><strong>Apellidos: </strong>{{ $persona->per_apepat}} {{ $persona->per_apemat }}</p>
						<p><strong>Nombres: </strong>{{ $persona->per_nombres}}</p>
						<p><strong>Nro. Documento: </strong>{{ $persona->per_nrodoc }}</p>
						<p><strong>Fecha Nacimiento: </strong>{{ $persona->per_fecnac }}</p>						
						@switch( $persona->per_sexo )
						    @case('H')
						        <p><strong>Sexo: </strong>Hombre</p>
						        @break
						    @case('M')
						        <p><strong>Sexo: </strong>Mujer</p>
						        @break
						    @default
						        <p><strong>Sexo: </strong>Indefinido</p>
						@endswitch
						@switch( $persona->per_ecivil )
						    @case('S')
						        <p><strong>Estado Civil: </strong>Soltero</p>
						        @break
						    @case('C')
						        <p><strong>Estado Civil: </strong>Casado</p>
						        @break
						    @case('D')
						        <p><strong>Estado Civil: </strong>Divorciado</p>
						        @break
						    @default
						        <p><strong>Estado Civil: </strong>Viudo</p>
						@endswitch
						<p><strong>Dirección: </strong>{{ $persona->per_dir }}</p>
						@if( $persona->per_tel == '')
							<p><strong>Teléfono: </strong>Ninguno</p>
						@else
							<p><strong>Teléfono: </strong>{{ $persona->per_tel }}</p>
						@endif
						@if( $persona->per_cel == '')
							<p><strong>Celular: </strong>Ninguno</p>
						@else
							<p><strong>Celular: </strong>{{ $persona->per_cel }}</p>
						@endif						
					</div>
					<div class="card-action">
						<a href="{{ route('backoffice.persona.edit', $persona) }}">EDITAR</a>
						<a href="#" style="color: red;" onclick="enviar_formulario()">ELIMINAR</a>
					</div>
					</div>
				</div>
			</div>
	    </div>
	</div>
	<form method="post" action="{{ route('backoffice.persona.destroy', $persona) }}" name="delete_form">
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