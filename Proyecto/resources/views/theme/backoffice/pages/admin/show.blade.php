@extends('theme.backoffice.layouts.admin')

@section('title', 'Orejitas Vet')

@section('head')
@endsection

@section('breadcrumbs')
@endsection

@section('dropdown_settings')
	{{-- <li><a href="" class="grey-text text-darken-2"></a></li> --}}
@endsection

@section('content')
  <div class="container">
    <!--card stats start-->
    <div id="card-stats">
      <div class="row mt-1">
        <a href="">
          <div class="col s12 m6 l3">
            <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text">
              <div class="padding-4">
                <div class="col s7 m7">
                  <i class="material-icons background-round mt-5">person</i>
                  <p></p>
                </div>
                <div class="col s5 m5 right-align">
                  <h5 class="mb-0">Clientes</h5>
                </div>
              </div>
            </div>
          </div>
        </a>
    <div class="col s12 m6 l3">
    <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text">
    <div class="padding-4">
    <div class="col s7 m7">
    <i class="material-icons background-round mt-5">perm_identity</i>
    <p>Clients</p>
    </div>
    <div class="col s5 m5 right-align">
    <h5 class="mb-0">1885</h5>
    <p class="no-margin">New</p>
    <p>1,12,900</p>
    </div>
    </div>
    </div>
    </div>
    <div class="col s12 m6 l3">
    <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text">
    <div class="padding-4">
    <div class="col s7 m7">
    <i class="material-icons background-round mt-5">timeline</i>
    <p>Sales</p>
    </div>
    <div class="col s5 m5 right-align">
    <h5 class="mb-0">80%</h5>
    <p class="no-margin">Growth</p>
    <p>3,42,230</p>
    </div>
    </div>
    </div>
    </div>
    <div class="col s12 m6 l3">
    <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text">
    <div class="padding-4">
    <div class="col s7 m7">
    <i class="material-icons background-round mt-5">attach_money</i>
    <p>Profit</p>
    </div>
    <div class="col s5 m5 right-align">
    <h5 class="mb-0">$890</h5>
    <p class="no-margin">Today</p>
    <p>$25,000</p>
    </div>
    </div>
    </div>
    </div>
    </div>
  </div>
@endsection

@section('foot')
@endsection