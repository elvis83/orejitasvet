@extends('theme.backoffice.layouts.admin')

@section('title', 'Editar factura' . $invoice->id)

@section('head')
@endsection

@section('breadcrumbs')
	<li>Editar factura {{ $invoice->id }}</li>
@endsection

@section('content')
	
	<div class="section">
		<p class="caption">Introduce los datos para editar la factura</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
					<span class="card-title">Editar Factura</span>
					<div class="row">

					<form class="col s12" method="post" action="{{ route('backoffice.client.invoice_update', [$user, $invoice]) }}">

						{{ csrf_field() }}


						<div class="row">
							<div class="input-field col s12">
								<input id="amount" type="text" name="amount" value="{{ $invoice->amount }}">
								<label for="amount">Monto de la factura</label>
								@if ($errors->has('amount'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('amount') }}</strong>
	                                </span>
	                            @endif
							</div>
						</div>

						<div class="row">
							<div class="input-default col s12">
								<select name="status">
									<option value="Pendiente"   @if($invoice->status == 'Pendiente') selected @endif>Pendiente</option>
									<option value="Aprobado"  @if($invoice->status == 'Aprobado') selected @endif>Pagado</option>
									<option value="Rechazado"  @if($invoice->status == 'Rechazado') selected @endif>Rechazado</option>
									<option value="Cancelado" @if($invoice->status == 'Cancelado') selected @endif>Cancelado</option>
									<option value="Devolución"  @if($invoice->status == 'Devolución') selected @endif>Devolución</option>
								</select>
								@if ($errors->has('status'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red;">{{ $errors->first('status') }}</strong>
                                </span>
                            @endif
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<button class="btn waves-effect waves-light right" type="submit" style="background-color: #74DF00;">ACTUALIZAR
								<i class="material-icons right">send</i>
								</button>
							</div>
						</div>

					</form>
					</div>
					</div>
				</div>
				</div>
			</div>
	    </div>
	</div>

@endsection

@section('foot')
@endsection