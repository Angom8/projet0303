<?php
getHTMLHead("Messages");

getAdmNavBar("Messages", "admin");
?>

<main>
	<div class ="content">
		<div class="container">
		  <h1 class="bato-row">Mes messages</h1>
		  <table class="table">
		    <thead class="thead-dark">
		      <tr>
			<th>NOM/PRENOM</th>
			<th>DATE ENVOI</th>
			<th class="text-center">ACTION</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr>
			<td>Makoulie</td>
			<td>16/08/2019</td>
			<td class="text-center">
				<button type="button" class="btn btn-secondary">Voir</button>
				<button type="button" class="btn btn-danger">Supprimer</button>
			</td>

		      </tr>
		      <tr>
			<td>TouhWater</td>
			<td>16/10/2019</td>
			<td class="text-center">
				<button type="button" class="btn btn-secondary">Voir</button>
				<button type="button" class="btn btn-danger">Supprimer</button>
			</td>

		      </tr>
		      <tr>
			<td>MaryEnterprises</td>
			<td>16/09/2019</td>
			<td class="text-center">
				<button type="button" class="btn btn-secondary">Voir</button>
				<button type="button" class="btn btn-danger">Supprimer</button>
			</td>

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
