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
		<link rel="shortcut icon" href="'.url('/medias/favicon.ico').'">
	    </head>
	    <body>';

	}
}

if (! function_exists('getNavBar')) {
	function getNavBar($title){

		echo '<header>
			<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Omonbatôô</a>
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
	function getFooter($type){

		echo '
	<footer class="container-fluid text-center ';

	if($type === 'external'){
		echo 'external-footer';
	}

	echo '">
		<p style="padding-top:10px">2019 - Tous droits réservés - <a href="content/about.html">Informations sur vos données et les Autorisations légales</a></p>
    </footer>';
	}
}

if (! function_exists('getLogoSection')) {
	function getLogoSection(){

		echo '
			<section id="mainLogo">
				<div class="container">
					<img src="'.url('/medias/img/front/main-logo.png').'" class="img-fluid mx-auto d-block" alt="Responsive image">
				</div>
			</section>';
	}
}

if (! function_exists('getExtButtons')) {

	function getExtButtons(){
		echo '
		<section id="buttons">
			<div class="container">
			  <div class="row text-center">
				<form class="col align-self-center" method="get" action='.url('/panel').'>
					<button type="submit"class="btn btn-lg btn-block btn-outline-dark main-btn shadow-sm">Espace Membre</button>
				</form>
				<form class="col align-self-center" method="get" action='.url('/contact').'>
					<button type="submit"class="btn btn-lg btn-block btn-outline-dark main-btn shadow-sm">S\'inscrire</button>
				</form>

				<form class="col align-self-center" method="get" action='.url('contact').'>
					<button type="submit"class="btn btn-lg btn-block btn-outline-dark main-btn shadow-sm">Nous contacter</button>
				</form>

			  </div>
			</div>
		</section>';

	}
}


if (! function_exists('getAdmButtons')) {

	function getAdmButtons($type_util){

		echo '
		<section id="buttons">
			<div class="container">
			  <div class="row text-center">';
		if($type_util === 2){
	
			echo '

				<form class="col align-self-center" method="get" action='.url('/admin/messages').'>
					<button type="submit" class="btn  btn-block btn-outline-dark main-btn shadow-sm ">Messages</button>
				</form>';
		}
		if($type_util === 1 or $type_util === 2){
	
						    
			echo '
				<form class="col align-self-center" method="get" action='.url('/helper/users').'>
					<button type="submit" class="btn  btn-block btn-outline-dark main-btn shadow-sm ">Utilisateurs</button>
				</form>
				<form class="col align-self-center" method="get" action='.url('/helper/add-user').'>
					<button type="submit" class="btn  btn-block btn-outline-dark main-btn shadow-sm ">Ajouter un utilisateur</button>
				</form>';
		}
	
			echo ' 	<form class="col align-self-center" method="get" action='.url('/panel/boats').'>
					<button type="submit" class="btn  btn-block btn-outline-dark main-btn shadow-sm ">Mes bateaux</button>
				</form>
				<form class="col align-self-center" method="get" action='.url('/panel/fournisseurs').'>
					<button type="submit" class="btn  btn-block btn-outline-dark main-btn shadow-sm ">Fournisseurs</button>
				</form>';
		
		
		echo '			  </div>
			</div>
		</section>';
	}
}

if (! function_exists('getCreateUser')) {

	function getCreateUser(){

		  echo '<div class="text-right bato-row">
			<a class="btn btn-warning" href="'.url('helper/add-user').'">Ajouter un Utilisateur</a>
		  </div>';
	}
	
}

if (! function_exists('getCreateBoat')) {

	function getCreateBoat($type_user){

		  if($type_user!=2){
		  echo '<div class="text-right bato-row">
			<a class="btn btn-warning" href="'.url('send-boat').'">Envoyer un Bateau</a>
		  </div>';
		}
		else{
		  echo '<div class="text-right bato-row">
			<a class="btn btn-warning" href="'.url('admin/add-boat').'">Ajouter un Bateau</a>
		  </div>';
		}
	}
	
}



if (! function_exists('getCreateFournisseur')) {

	function getCreateFournisseur($type_user){

		  if($type_user!=2){
		  echo '';
		}
		else{
		  echo '<div class="text-right bato-row">
			<a class="btn btn-warning" href="'.url('admin/add-fourni').'">Ajouter un Fournisseur</a>
		  </div>';
		}
	}
	
}


if (! function_exists('getAdmNavBar')) {

	function getAdmNavBar($title, $type_util){

		echo '<header>
			<nav class="navbar navbar-expand-md navbar-dark bg-dark">
			  <a class="navbar-brand" href="#">Omonbatôô</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarsExample04">
			    <ul class="navbar-nav  ml-auto">
			      <li class="nav-item';

				if($title === "Panel"){echo ' active';}

				echo '">
				<a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Accéder à mon Panel" href="'.url('/panel').'">Mon panel</a>
			      </li>
				</li>
				<li class="nav-item">
				<a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Accueil du site" href="'.url('/').'">Accueil du site</a>
			      </li>';

			      if($type_util === 'admin'){

					echo'<li class="nav-item';

					if($title === "Messages"){echo ' active';}

					echo '">
					<a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Mes messages" href="'.url('/admin/messages').'">Messages</a>
				      </li>';

				}

			     if($type_util === 'secretaire' or $type_util === 'admin'){


					echo'<li class="nav-item';

					if($title === "Utilisateurs"){echo ' active';}

					echo '">
					<a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Utilisateurs" href="'.url('/helper/users').'">Utilisateurs du site</a>
				      </li>';

					echo'<li class="nav-item';

					if($title === "Ajouter Utilisateur"){echo ' active';}

					echo '">
					<a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Ajouter un Utilisateur" href="'.url('/helper/add-user').'">Ajouter un utilisateur</a>
				      </li>';
				}

			    if($type_util !== 'secretaire'){	

					echo'<li class="nav-item';

					if($title === "Bateaux"){echo ' active';}

					echo '">
					<a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Mes bateaux" href="'.url('/panel/boats').'">Bateaux</a>
				      </li>';

					echo'<li class="nav-item';

					if($title === "Fournisseurs"){echo ' active';}

					echo '">
					<a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Fournisseurs" href="'.url('/panel/fournisseurs').'">Fournisseurs</a>
				      </li>';
				}

				echo '<li class="nav-item">
				<a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Se déconnecter" href="'.url('/logout').'">Déconnexion</a>
			      </li>
			    </ul>
			  </div>
			</nav>

		</header>';
	}
}
?>


