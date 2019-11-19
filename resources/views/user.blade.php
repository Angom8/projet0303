<?php
getHTMLHead("Liste des utilisateurs");

getNavBar("");
?>

<main>
<div class="container">
  <h2>Utilisateurs</h2>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>NOM</th>
        <th>PRENOM</th>
        <th>DATE D'INSCRIPTION</th>
		<th>NB BATEAUX</th>
		<th>ID ADHERENT</th>
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
 </main>
<?php

getFooter('external');

getHTMLFooter();

?>