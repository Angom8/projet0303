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
					      <label for="inputProblem">Objet</label>
					      <select id="inputProblem" class="form-control">
						<option selected>Je souhaite m'insrcire</option>
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
					<button type="submit" class="btn btn-secondary">Envoyer votre demande</button>
					</form>
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
