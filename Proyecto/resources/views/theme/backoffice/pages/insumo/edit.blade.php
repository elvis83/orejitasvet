@extends('theme.backoffice.layouts.admin')

@section('title', 'Editar insumo')

@section('head')
@endsection

@section('breadcrumbs')
	<li><a href="{{ route('backoffice.insumo.index') }}">Insumos</a></li>
	<li class="active">Editar insumo</li>
@endsection

@section('content')
	
	<div class="section">
		<p class="caption">Introduce los datos de las insumo.</p>
		<div class="divider"></div>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
					<div class="card-content">
					<span class="card-title">Editar insumo</span>
					<div class="row">
					<form class="col s12" method="post" action="{{ route('backoffice.insumo.update', $insumo) }}">
						
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						
						<div class="row">
							<div class="input-field col s12">
								<i class="material-icons prefix">colorize</i>
								<input id="ins_desc" type="text" name="ins_desc" value="{{ $insumo->ins_desc }}" autofocus="">
								<label for="ins_desc">Nombre del insumo</label>
								@if ($errors->has('ins_desc'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('ins_desc') }}</strong>
	                                </span>
	                            @endif
							</div>						
						</div>
						<div class="row">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">assessment</i>
                                <select name="ins_uni">
                                	<option value="{{ $insumo->ins_uni }}" selected="">{{ $insumo->ins_uni }}</option>			
                                    <option value="Unidad">Unidad</option>
                                    <option value="Sobre">Sobre</option>
                                </select>
                                <label for="">Selecciona unidad de medida</label>
                            </div>
                            <div class="input-field col s6">
								<i class="material-icons prefix">filter_9_plus</i>
								<input id="ins_stock" type="number" name="ins_stock" value="{{ $insumo->ins_stock }}">
								<label for="ins_stock">Stock</label>
								@if ($errors->has('ins_stock'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('ins_stock') }}</strong>
	                                </span>
	                            @endif
							</div>
                        </div>                        
						<div class="row">							
							<div class="input-field col s6">
                                <i class="material-icons prefix">today</i>
								<input id="ins_fecven" type="date" name="ins_fecven" value="{{ $insumo->ins_fecven }}">
								@if ($errors->has('ins_fecven'))
	                                <span class="invalid-feedback" role="alert">
	                                    <strong style="color: red;">{{ $errors->first('ins_fecven') }}</strong>
	                                </span>
	                            @endif
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">check</i>
                                <select name="ins_estado">
                                	@if($insumo->ins_estado=='D')
                                		<option value="D" selected="">Disponible</option>
                                    	<option value="F">Faltante</option>
                                    @elseif($insumo->ins_estado=='F')
                                    	<option value="D">Disponible</option>
                                    	<option value="F" selected="">Faltante</option>
                                    @endif
                                </select>
                                <label for="">Selecciona estado</label>
                            </div>
                        </div>
						<div class="input-field col s12">
							<button class="btn waves-effect waves-light right" type="submit" style="background-color: #74DF00;">Guardar
							<i class="material-icons right">send</i>
							</button>
						</div>
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