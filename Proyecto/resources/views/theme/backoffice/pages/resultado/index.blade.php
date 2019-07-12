@extends('theme.backoffice.layouts.admin')

@section('title', 'Resultados')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.resultado.index') }}">Resultados</a></li>
@endsection

@section('dropdown_settings')
	<li><a href="{{ route('backoffice.resultado.create') }}" class="grey-text text-darken-2"><i class="material-icons">healing</i>Crear resultados</a></li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Resultados</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12">
					<div class="card">
					<div class="card-content">
						<table class="striped responsive-table">
							<thead>
								<tr>
									<th>Anexo</th>
									<th>Observaciones</th>									
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>

							
							</tbody>
						</table>
					</div>
					</div>
				</div>
			</div>
	    </div>
	</div>
@endsection

@section('foot')
@endsection