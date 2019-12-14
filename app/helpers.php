<?php
/*Helping functions file, not useful, but neat to have*/




/*Get the logo*/
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

/*Get the first page actions*/
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

/**Get the first page action buttons
     * @param  Auth => type utilisateur
*/
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

/*Get the create User button for the helpers*/
if (! function_exists('getCreateUser')) {

	function getCreateUser(){

		  echo '<div class="text-right bato-row">
			<a class="btn btn-warning" href="'.url('helper/add-user').'">Ajouter un Utilisateur</a>
		  </div>';
	}
	
}
/*Get the create Entretien for the admins*/
if (! function_exists('getCreateEntretien')) {

	function getCreateEntretien(){

		  echo '<div class="text-right bato-row">
			<a class="btn btn-warning" href="'.url('admin/add-entretien').'">Générer un entretien</a>
		  </div>';
	}
	
}

/**Adapt the boat button
     * @param  Auth => type utilisateur
*/
if (! function_exists('getCreateBoat')) {

	function getCreateBoat($type_user){

		  if($type_user!=2){
		  echo '<div class="text-right bato-row">
			<a class="btn btn-warning" href="'.url('panel/send-boat').'">Envoyer un Bateau</a>
		  </div>';
		}
		else{
		  echo '<div class="text-right bato-row">
			<a class="btn btn-warning" href="'.url('admin/add-boat').'">Ajouter un Bateau</a>
		  </div>';
		}
	}
	
}


/**Get the create Fournisseur button for the admins
     * @param  Auth => type utilisateur
*/
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

?>


