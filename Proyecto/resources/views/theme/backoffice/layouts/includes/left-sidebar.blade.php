<aside id="left-sidebar-nav">
  <ul id="slide-out" class="side-nav fixed leftside-navigation">
    <li class="user-details cyan darken-2">
      <div class="row">
        <div class="col col s4 m4 l4">
          <img src="images/avatar/avatar-7.png" alt="" class="circle responsive-img valign profile-image cyan">
        </div>
        <div class="col col s8 m8 l8">
          <ul id="profile-dropdown-nav" class="dropdown-content">
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
          <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown-nav">Admistrador<i class="mdi-navigation-arrow-drop-down right"></i></a>
          <p class="user-roal">Administrador</p>
        </div>
      </div>
    </li>
    <li class="no-padding">
      <ul class="collapsible" data-collapsible="accordion">

        <li class="bold">
          <a href="{{ route('backoffice.admin.show') }}" class="waves-effect waves-cyan">
              <i class="material-icons">pie_chart_outlined</i>
              <span class="nav-text">Panel de Administraci&oacute;n</span>
            </a>
        </li>

        <li class="bold">
          <a href="{{ route('backoffice.user.index') }}" class="waves-effect waves-cyan">
              <i class="material-icons">people</i>
              <span class="nav-text">Usuarios de Sistema</span>
            </a>
        </li>

        <li class="bold">
          <a href="{{ route('backoffice.tipodocumento.index') }}" class="waves-effect waves-cyan">
              <i class="material-icons">chrome_reader_mode</i>
              <span class="nav-text">Documentos de Identidad</span>
            </a>
        </li>
        
        <li class="bold">
          <a href="{{ route('backoffice.role.index') }}" class="waves-effect waves-cyan">
              <i class="material-icons">perm_identity</i>
              <span class="nav-text">Roles del Sistema</span>
            </a>
        </li>

        <li class="bold">
          <a href="{{ route('backoffice.permission.index') }}" class="waves-effect waves-cyan">
              <i class="material-icons">vpn_key</i>
              <span class="nav-text">Permisos del Sistema</span>
            </a>
        </li>

        <li class="bold">
          <a href="{{ route('backoffice.speciality.index') }}" class="waves-effect waves-cyan">
              <i class="material-icons">local_hospital</i>
              <span class="nav-text">Especialidades médicas</span>
            </a>
        </li>

      </ul>
    </li>
  </ul>
  <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only">
    <i class="material-icons">menu</i>
  </a>
</aside>