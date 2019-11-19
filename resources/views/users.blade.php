<?php
getHTMLHead("Liste des utilisateurs");

getAdmNavBar("Utilisateurs", "admin");
?>

<main>
	<div class ="content">
		<div class="container">
		  <h1>Utilisateurs</h1>
		  <table class="table">
		    <thead class="thead-dark">
		      <tr>
			<th>NOM</th>
			<th>PRENOM</th>
			<th>DATE D'INSCRIPTION</th>
			<th>NB BATEAUX</th>
			<th>ID ADHERENT</th>
			<th>ACTION</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr>
			<td>John</td>
			<td>Doe</td>
			<td>16/08/2019</td>
				<td>1</td>
				<td>0000000</td>
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
