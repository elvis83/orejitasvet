@extends('theme.frontoffice.layouts.main')

@section('title', '')

@section('head')
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
                    
                </div>
            </div>
        </div>
     </div>
@endsection

@section('foot')
@endsection
