@extends('layouts.app')
@section('title')
Contact
@endsection
@section('content')

<main>

	<div class="row">
  		<div class="left-contact w-75">
			<div class="container">
				<h1>Contact</h1>
					<form method="post" action={{ route('contact.form') }}>
					{{ csrf_field() }}
					    <div class="form-group ">
					      <label for="inputNom">Nom</label>
					      <input type="text" class="form-control" name="inputNom" id="inputNom" placeholder="John" required>
					    </div>
					    <div class="form-group ">
					      <label for="inputPrenom">Prenom</label>
					      <input type="text" class="form-control" name="inputPrenom" id="inputPrenom" placeholder="Doe" required>
					    </div>
					  <div class="form-group">
					    <label for="inputMail">Mail</label>
					    <input type="email" class="form-control" name="inputMail" id="inputMail" placeholder="bateau@outlook.fr" required>
					  </div>
					
					    <div class="form-group">
					      <label for="inputProblem">Objet</label>
					      <select id="inputProblem" name ="inputProblem" class="form-control">
						<option selected>Je souhaite m'inscrire</option>
						<option>J'ai rencontré un bogue</option>
						<option>Je souhaite contacter l'administrateur du site</option>
						<option>Je souhaite signaler une infraction</option>
						<option>Je rencontre un autre problème</option>
					      </select>
					    </div>
					  <div class="form-group">
					  <div class="form-group">
					    <label for="exampleFormControlTextarea1">Message</label>
					    <textarea name="inputMsg" class="form-control" id="inputMsg" rows="3"></textarea>
					  </div>
					 </div>
					<button type="submit" class="btn btn-secondary">Envoyer votre demande</button>
					</form>
<?php
			if(isset($contactmail)){
				if($contactmail == 1) {
			    		echo '<p style="color:green">Votre message a bien été envoyé.</p>';
				}
				else{
			   		echo '<p style="color:red">Erreur.</p>';
				}
			
		   	 }	
        
    
?>
			</div>
		</div>

  		<div class="text-center right-contact w-25 my-auto h-100">
			<div class="container my-auto">
				<h5>L'association Ohmonbatôô propose à ses adhérents de gérer en ligne leurs bateaux, afin de faciliter leur entretien. </h5>
				<h5>Si vous êtes adhérent et souhaitez vous inscrire, merci de remplir le formulaire ci-contre en précisant bien le numéro adhérent donné lors du paiement de votre cotisation.</h5>
			</div>
		</div>
	</div>

</main>		

@endsection		  
