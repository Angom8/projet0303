@extends('layouts.admin')
@section('title')
Envoyer un bateau
@endsection
@section('content')
	
	<main>
		<div class="content">
		    <div class="row justify-content-center">
			<div class="col-md-8">
				<h1>{{ __('Envoyer un Bateau') }}</h1>
			    <div class="card">
				

				<div class="card-body">
			
				    <form enctype="multipart/form-data" method="POST" action="{{ route('boat.send.send') }}">
				        @csrf

				        <div class="form-group row">
				   
						<input id="id_utilisateur" type="hidden" class="form-control @error('id_utilisateur') is-invalid @enderror" name="id_utilisateur" value="{{ Auth::user()->id }}" required autocomplete="id_utilisateur" autofocus>

				        </div>
		    
					<div class="form-group row">
						<label class="col-md-4 col-form-label text-md-right" for='joint[]'><p>Pièces justificatives</p></label>
						
						<div class="col-md-6">
							
       							 <input accept="image/png, image/jpeg, application/pdf" type="file" name="joint[]" id="joint[]" multiple="multiple">
							
						</div>
						
						
				        </div>

				<div class="form-group row">
					<p>JPEG/PNG/PDF acceptés. Taille maximale par fichier : 5Mo. Merci de lier : </p>

					<ul>
						<li>L'index avec la liste des composants (fiche constructeur)</li>
						<li>Une image du bateau</li>
						<li>Le certificat de possession</li>
						<li>Le certificat d'Immatriculation</li>
						<li>Une copie du permis du propriétaire</li>
						<li>Une copie du compte-rendu du dernier controle technique</li>
					
					</ul>
					<p>Vous recevrez dans les plus brefs délais, par l'adresse mail de votre compte, une confirmation ou un refus de la mise en ligne de votre bateau</p>
				</div>
					<div class="form-group row mb-0">
				            <div class="col-md-6 offset-md-4">
				                <button type="submit" class="btn btn-secondary">
				                   Demander une mise en ligne du bateau
				                </button>
						 </div>
				        </div>
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
				    </form>

				
				</div>
			    </div>
			</div>
		    </div>
		</div>
	</main>
@endsection
