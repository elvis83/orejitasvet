@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel de Control</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(auth()->user()->has_role(config('app.client_role')))
                        <a 
                            href="{{ route('frontoffice.user.profile') }}">
                            Panel de Control Cliente
                        </a>
                    @elseif(auth()->user()->has_role(config('app.assistant_role')))
                        <a 
                            href="{{ route('backoffice.admin.show') }}">
                            Panel de Control Asistente
                        </a>
                    @else
                        <a 
                            href="{{ route('backoffice.admin.show') }}">
                            Panel de Control Administrador
                        </a> 
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
