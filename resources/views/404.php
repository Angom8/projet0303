<?php
getHTMLHead("Erreur 404");

getNavBar("Erreur 404");
?>

<main>

	<?php getLogoSection(); ?>

		<section id="jumbotron">
			<div class="jumbotron">
				<div class="container">
					<h1>Erreur 404 : Page non trouvée</h1>
				</div>
			</div>
		</section>

</main>

<?php

getFooter('external');

getHTMLFooter();

?>
