<?php

if (! function_exists('getHTMLHead')) {
	function getHTMLHead($title){

		echo '<!DOCTYPE html>
	<html lang="fr-fr">
	    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<title>'.$title.'</title>
		<!-- Fonts -->
	       <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css"> 
		<!-- Styles -->
		<link rel="stylesheet" href="'.url('/css/design-external.css').'">
	    </head>
	    <body>';

	}
}

if (! function_exists('getNavBar')) {
	function getNavBar($title){

		echo '<header>
			<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Omonbato</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample04">
    <ul class="navbar-nav  ml-auto">
      <li class="nav-item';

	if($title === "Accueil"){echo ' active';}

	echo '">
        <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Accueil" href="'.url('/').'">Accueil</a>
      </li>
      <li class="nav-item';

	if($title === "Contact"){echo ' active';}

	echo '">
        <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Contact" href="'.url('/contact').'">Contact</a>
      </li>
	<li class="nav-item">
        <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Se connecter" href="'.url('/login').'">Connexion</a>
      </li>
	<li class="nav-item">
        <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Accéder à mon panel" href="'.url('/mypanel').'">Panel de gestion</a>
      </li>
    </ul>
  </div>
</nav>

		</header>';

	}
}

if (! function_exists('getHTMLFooter')) {
	function getHTMLFooter(){

		echo '
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="'.url('/js/design-external.js').'"></script>
		</body>

</html>';
	}
}


if (! function_exists('getFooter')) {
	function getFooter(){

		echo '
	<footer class="container-fluid text-center" id="footer" style="background-color: #f2f2f2; padding:3px">
		<p style="padding-top:10px">2019 - Tous droits réservés - <a href="content/about.html">Informations sur vos données et les Autorisations légales</a></p>
    </footer>';
	}
}

?>


