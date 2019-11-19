<?php
getHTMLHead("Liste des utilisateurs");

getAdmNavBar("Utilisateurs", "admin");
?>

<main>
	<div class ="content">
		<div class="container">
		  <h1>Utilisateurs</h1>
		  <div class="text-right bato-row">
		 	 <button type="button" class="btn btn-warning">Ajouter un utilisateur</button>
		  </div>
		  <table class="table">
		    <thead class="thead-dark">
		      <tr>
			<th>NOM</th>
			<th>PRENOM</th>
			<th>DATE D'INSCRIPTION</th>
			<th>NB BATEAUX</th>
			<th>ID ADHERENT</th>
			<th class="text-center">ACTION</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr>
			<td>John</td>
			<td>Doe</td>
			<td>16/08/2019</td>
			<td>1</td>
			<td>0000000</td>
			<td class="text-center">
				<button type="button" class="btn btn-secondary">Voir</button>
				<button type="button" class="btn btn-danger">Supprimer</button>
			</td

		      </tr>
		      <tr>
			<td>Jeanne</td>
			<td>Doe</td>
			<td>16/10/2019</td>
			<td>1</td>
			<td>0000001</td>
			<td class="text-center">
				<button type="button" class="btn btn-secondary">Voir</button>
				<button type="button" class="btn btn-danger">Supprimer</button>
			</td

		      </tr>
		      <tr>
			<td>Mary</td>
			<td>Sue</td>
			<td>16/09/2019</td>
			<td>1</td>
			<td>0000002</td>
			<td class="text-center">
				<button type="button" class="btn btn-secondary">Voir</button>
				<button type="button" class="btn btn-danger">Supprimer</button>
			</td

		      </tr>
		    </tbody>
		  </table>
		</div>
	 </div>
 </main>
<?php

getFooter('external');

getHTMLFooter();

?>
