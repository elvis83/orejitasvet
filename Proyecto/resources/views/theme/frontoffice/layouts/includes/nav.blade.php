<nav class="light-green accent-4">
	<div class="nav-wrapper container">
		<a href="#" class="brand-logo">Orejitas Vet</a>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li><a href="#">Inicio</a></li>
			<li><a 
					href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                	{{ __('Salir') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  	@csrf
              	</form>
            </li>
			@yield('nav')
		</ul>
	</div>
</nav>