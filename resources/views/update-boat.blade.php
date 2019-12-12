@extends('layouts.admin')
@section('title')
Mettre à jour le bateau {{ $boat }}
@endsection
@section('content')
	
	<main>
		<div class="content">
		    <div class="row justify-content-center">
			<div class="col-md-8">
				<h1>{{ __('Mettre à jour le Bateau') }} {{ $boat }}</h1>
			    <div class="card">
				

				<div class="card-body">
			
				    <form enctype="multipart/form-data" method="POST" action="{{ route('boat.update.send') }}">
				        @csrf

				        <div class="form-group row">
				    
				                <input id="id_bateau" type="hidden" class="form-control @error('id_bateau') is-invalid @enderror" name="id_bateau" value="{{ $boat }}" required autocomplete="id_bateau" autofocus>
						<input id="id_utilisateur" type="hidden" class="form-control @error('id_utilisateur') is-invalid @enderror" name="id_utilisateur" value="{{ Auth::user()->id }}" required autocomplete="id_utilisateur" autofocus>

				        </div>

				        <div class="form-group row">
				            <label for="msg" class="col-md-4 col-form-label text-md-right">Message (120 caractères max)</label>

				            <div class="col-md-6">
				                <textarea id="msg" class="form-control @error('msg') is-invalid @enderror" name="msg" value="{{ old('msg') }}" required autocomplete="msg" autofocus></textarea>

				                @error('msg')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>			    

					<div class="form-group row">
				            <label for="type_update" class="col-md-4 col-form-label text-md-right">Objet</label>

				            <div class="col-md-6">
				                <input id="type_update" type="radio" class="" name="type_update" value="update" required autocomplete="type_update" autofocus checked>Simple mise à jour
				                <input id="type_update" type="radio" class="" name="type_update" value="entretien" required autocomplete="type_update" autofocus>Entretien
 						<input id="type_update" type="radio" class="" name="type_update" value="delete" required autocomplete="type_update" autofocus>Retrait
				                @error('type_update')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>


					<div class="form-group row">
						<label class="col-md-4 col-form-label text-md-right" for='joint'><p>Ajouter un document justificatif</p><p>(JPEG/PNG/PDF acceptés)</p> </label>
						
						<div class="col-md-6">
						
       							 <input accept="image/png, image/jpeg, application/pdf" type="file" name="joint" id="joint">
							
						</div>
				        </div>



					<div class="form-group row mb-0">
				            <div class="col-md-6 offset-md-4">
				                <button type="submit" class="btn btn-secondary">
				                   Demander une mise à jour
				                </button>
						 </div>
				        </div>

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
