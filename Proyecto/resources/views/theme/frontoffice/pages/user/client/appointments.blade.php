@extends('theme.frontoffice.layouts.main')

@section('title', 'Mis citas')

@section('head')
@endsection

@section('nav')
@endsection

@section('content')
	<div class="container">
        <div class="row">
        	@include('theme.frontoffice.pages.user.includes.nav')
        	{{-- Seccion Principal--}}
        	<div class="col s12 m8">
        		<div class="card">        			
        			<div class="card-content">
        				<span class="card-title">
        				@yield('title')
        			</span>
        			<table>
        				<thead>
        					<tr>
        						<th>ID</th>
        						<th>Especialista</th>
        						<th>Fecha</th>
        						<th>Hora</th>
        						<th>Estado</th> {{-- Finalizado, Pagado, Pendiente, Cancelado --}}
        					</tr>
        				</thead>
        				<tbody>
        					<tr>
        						<td>1</td>
        						<td>Jorge</td>
        						<td>15 junio 2019</td>
        						<td>16:00</td>
        						<td>Pagado</td>
        					</tr>
        				</tbody>
        			</table>
        			</div>
        		</div>
        	</div>
        </div>
     </div>
@endsection

@section('foot')
@endsection