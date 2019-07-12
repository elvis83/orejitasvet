<header id="header" class="page-topbar">
  <!-- start header nav-->
  <div class="navbar-fixed">
    <nav class="navbar-color gradient-45deg-light-blue-cyan" style="background-image: linear-gradient(-45deg, #00FF00, #74DF00);">
      <div class="nav-wrapper">
        <ul class="left">
          <li>
            <h1 class="logo-wrapper">
              <a href="index.html" class="brand-logo darken-1">
                <img src="/images/logo/materialize-logo.png" alt="materialize logo">
                <span class="logo-text hide-on-med-and-down">Orejitas Vet</span>
              </a>
            </h1>
          </li>
        </ul>
        
        <ul class="right hide-on-med-and-down">
          
          <li>
            <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
              <i class="material-icons">settings_overscan</i>
            </a>
          </li>
          
          <li>
            <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
              <span class="avatar-status avatar-online">
                <img src="/images/avatar/avatar-7.png" alt="avatar">
                <i></i>
              </span>
            </a>
          </li>
          
        </ul>
        
        <!-- profile-dropdown -->
        <ul id="profile-dropdown" class="dropdown-content">
          <li>
            <a href="#" class="grey-text text-darken-1">
              <i class="material-icons">face</i> Perfil</a>
          </li>
          <li>
            <a href="#" class="grey-text text-darken-1">
              <i class="material-icons">settings</i> Ajustes</a>
          </li>
          <li>
            <a href="#" class="grey-text text-darken-1">
              <i class="material-icons">live_help</i> Ayuda</a>
          </li>
          <li class="divider"></li>
          <li>
            <a class="grey-text text-darken-1" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              <i class="material-icons">keyboard_tab</i> {{ __('Salir') }}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </li>
        </ul>
      </div>
    </nav>
  </div>

</header>