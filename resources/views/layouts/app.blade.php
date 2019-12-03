<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->

    <!-- Fonts -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
		<link rel="stylesheet" href="{{ url('/css/design-external.css') }}">
		<link rel="shortcut icon" href="{{ url('/medias/favicon.ico') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Omonbatôô</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample04">
    <ul class="navbar-nav  ml-auto">
<li class="nav-item {{ (strpos(Route::currentRouteName(), 'hhome') == 1) ? 'active' : '' }}">
        <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Accueil" href="{{ url('/') }}">Accueil</a>
      </li>
      <li class="nav-item {{ (strpos(Route::currentRouteName(), 'hcontact') == 1) ? 'active' : '' }} ">
        <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Contact" href="{{ url('/contact') }}">Contact</a>

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Se connecter" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->login }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Déconnexion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Accéder à mon panel" href="{{ url('/mypanel') }}">Panel de gestion</a>
			      </li>
			
                        	@endguest
   		 </ul>
  </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
<footer class="container-fluid text-center external-footer">
		<p style="padding-top:10px">2019 - Tous droits réservés - <a href="{{ url('contact') }}">Informations sur vos données et les Autorisations légales</a></p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="{{ url('/js/design-external.js') }}"></script>
		</body>

</html>
