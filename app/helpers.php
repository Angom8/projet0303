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
	       <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
		<!-- Styles -->
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
    <ul class="navbar-nav mr-auto">
      <li class="nav-item';

	if($title === "Accueil"){echo ' active';}

	echo '">
        <a class="nav-link" href="'.url('/').'">Accueil</a>
      </li>
      <li class="nav-item';

	if($title === "Contact"){echo ' active';}

	echo '">
        <a class="nav-link" href="'.url('/contact').'">Contact</a>
      </li>
	<li class="nav-item">
        <a class="nav-link" href="'.url('/login').'">Connexion</a>
      </li>
	<li class="nav-item">
        <a class="nav-link" href="'.url('/mypanel').'">Panel de gestion</a>
      </li>
    </ul>
  </div>
</nav>

		</header>';

	}
}



?>


