<?php
getHTMLHead("Accueil");

getNavBar("Accueil");
?>

<main>

	<?php getLogoSection(); ?>

		<section id="buttons">
			<div class="container">
			  <div class="row text-center">
			    <div class="col">
				<button type="button" class="btn btn-lg btn-block btn-outline-primary main-btn shadow-sm">Espace Membre</button>
			    </div>

			    <div class="col">
				<button type="button" class="btn btn-lg btn-block btn-outline-primary main-btn shadow-sm">S'inscire</button>
			    </div>

			    <div class="col">
				<button type="button" class="btn btn-lg btn-block btn-outline-primary  main-btn shadow-sm">Nous contacter</button>
			    </div>

			  </div>
		</section id="buttons">

		<section id="jumbotron">
			<div class="jumbotron">
				<div class="container">
					<p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
			</div>
		</section>

</main>




<?php

getFooter();

getHTMLFooter();

?>
