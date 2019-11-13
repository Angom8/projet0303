<?php
getHTMLHead("Contact");

getNavBar("Contact");
?>

<main>

	<div class="row">
  		<div class="col-sm-8">
			<div class="container">
				<h1>Contact</h1>
				    <form method="post">
					<label>Votre Nom</label>
					<input type="text" name="nom" required><br>
					<label>Votre Prenom</label>
					<input type="text" name="prenom" required><br>
					<label>Votre email</label>
					<input type="email" name="email" placeholder="nom@exemple.com" onblur="checkmail()" required><br>
					<label>Message</label>
					<textarea name="message" required></textarea><br>
					<label>Destinataire</label>
					<input type="submit">
				    </form>
			</div>
		</div>
  		<div class="col-sm-4 text-center right-contact">
			<div class="container">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</div>
		</div>
	</div>

</main>

<?php

getFooter();

getHTMLFooter();

?>
