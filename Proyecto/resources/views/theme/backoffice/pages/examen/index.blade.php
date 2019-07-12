@extends('theme.backoffice.layouts.admin')

@section('title', 'Exámenes')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.examen.index') }}">Exámenes</a></li>
@endsection

@section('dropdown_settings')
	<li><a href="{{ route('backoffice.examen.create') }}" class="grey-text text-darken-2"><i class="material-icons">healing</i>Crear examen</a></li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Exámenes</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12">
					<div class="card">
					<div class="card-content">
						<table class="striped responsive-table">
							<thead>
								<tr>
									<th>Mascota</th>
									<th>Examen</th>
									<th>Peso</th>
									<th>Anomalias</th>
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