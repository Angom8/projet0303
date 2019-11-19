<?php
getHTMLHead("Contact");

getNavBar("Contact");
?>

<main>

	<div class="row">
  		<div class="left-contact w-75">
			<div class="container">
				<h1>Contact</h1>
					<form>
					    <div class="form-group ">
					      <label for="inputNom">Nom</label>
					      <input type="text" class="form-control" id="inputNom" placeholder="John">
					    </div>
					    <div class="form-group ">
					      <label for="inputPrenom">Prenom</label>
					      <input type="text" class="form-control" id="inputPrenom" placeholder="Doe">
					    </div>
					  <div class="form-group">
					    <label for="inputMail">Mail</label>
					    <input type="email" class="form-control" id="inputMail" placeholder="bateau@outlook.fr">
					  </div>
					
					    <div class="form-group">
					      <label for="inputProblem">Problem</label>
					      <select id="inputProblem" class="form-control">
						<option selected>Objet</option>
						<option>J'ai rencontré un bogue</option>
						<option>Je souhaite contacter l'administrateur du site</option>
						<option>Je souhaite signaler une infraction</option>
						<option>Je rencontre un autre problème</option>
					      </select>
					    </div>
					  <div class="form-group">
					  <div class="form-group">
					    <label for="exampleFormControlTextarea1">Message</label>
					    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
					  </div>
										  </div>
					<button type="submit" class="btn btn-primary">Envoyer votre demande</button>
					</form>
			</div>
		</div>


  		<div class="text-center right-contact w-25">
			<div class="container">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</div>
		</div>
	</div>

</main>

<?php

getFooter('external');

getHTMLFooter();

?>					  
