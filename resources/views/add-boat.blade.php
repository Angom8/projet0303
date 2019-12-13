@extends('layouts.admin')
@section('title')
Ajouter un bateau
@endsection
@section('content')
	
	<main>
		<div class="content">
		    <div class="row justify-content-center">
			<div class="col-md-8">
				<h1>{{ __('Ajouter un Bateau') }}</h1>
			    <div class="card">
				

				<div class="card-body">
					<p>Tous les champs sont obligatoires</p>

<?php
			if(isset($contact)){
				if($contact == 1) {
			    		echo '<p style="color:green">Le bateau a bien été ajouté</p>';
				}
				else{
			   		echo '<p style="color:red">Erreur.</p>';
				}
			
		   	 }	

?>
			

				    <form method="POST" action="{{ route('admin.store.bateau') }}">
				        @csrf

				        <div class="form-group row">
				            <label for="id_utilisateur[]" class="col-md-4 col-form-label text-md-right">{{ __('Propriétaire(s)') }}</label>

				            <div class="col-md-6">
						 <select  id="id_utilisateur[]" class="form-control @error('id_utilisateur') is-invalid @enderror" name="id_utilisateur[]" value="{{ old('id_utilisateur') }}" required autocomplete="id_utilisateur[]" size="3" multiple>
							@foreach($users as $user)
								<option value="{{ $user }}">{{ $user }}</option>
							@endforeach
						 
						 </select> 

				                @error('id_utilisateur[]')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

				        <div class="form-group row">
				            <label for="nom_bateau" class="col-md-4 col-form-label text-md-right">{{ __('Nom du bateau') }}</label>

				            <div class="col-md-6">
				                <input id="nom_bateau" type="text" class="form-control @error('nom_bateau') is-invalid @enderror" name="nom_bateau" value="{{ old('nom_bateau') }}" required autocomplete="nom_bateau" autofocus>

				                @error('nom_bateau')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

				        <div class="form-group row">
				            <label for="url_photo" class="col-md-4 col-form-label text-md-right">{{ __('URL de la photo') }}</label>

				            <div class="col-md-6">
				                <input id="url_photo" type="text" class="form-control @error('url_photo') is-invalid @enderror" name="url_photo" value="{{ old('url_photo') }}" required autocomplete="url_photo" autofocus>

				                @error('url_photo')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

				        <div class="form-group row">
				            <label for="id_immatr" class="col-md-4 col-form-label text-md-right">{{ __('Immatriculation') }}</label>

				            <div class="col-md-6">
				                <input id="id_immatr" type="text" class="form-control @error('id_immatr') is-invalid @enderror" name="id_immatr" value="{{ old('id_immatr') }}" required autocomplete="id_immatr" autofocus>

				                @error('id_immatr')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

					<div class="form-group row">
				            <label for="date_immatr" class="col-md-4 col-form-label text-md-right">Date de l'immatriculation</label>

				            <div class="col-md-6">
				                <input id="date_immatr" type="date"  class="form-control @error('date_immatr') is-invalid @enderror" name="date_immatr" required  autocomplete="date_immatr" autofocus>

				                @error('date_immatr')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
					<div class="form-group row">
				            <label for="created_at" class="col-md-4 col-form-label text-md-right">Date de construction</label>

				            <div class="col-md-6">
				                <input id="created_at" type="date"  class="form-control @error('created_at') is-invalid @enderror" name="created_at" required  autocomplete="created_at" autofocus>

				                @error('created_at')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
					<div class="form-group row">
				            <label for="ancienne_cat" class="col-md-4 col-form-label text-md-right">{{ __('Ancienne catégorie') }}</label>

				            <div class="col-md-6">
				                <input id="ancienne_cat" type="number" min="1" max="6" class="form-control @error('ancienne_cat') is-invalid @enderror" name="ancienne_cat" value="{{ old('ancienne_cat') }}" required autocomplete="ancienne_cat" autofocus>

				                @error('ancienne_cat')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

				        <div class="form-group row">
				            <label for="auto_videur" class="col-md-4 col-form-label text-md-right">Auto-videur ?</label>

				            <div class="col-md-6">
				                <input id="auto_videur" type="radio" class="" name="auto_videur" value="0" required autocomplete="auto_videur" autofocus checked>Non
				                <input id="auto_videur" type="radio" class="" name="auto_videur" value="1" required autocomplete="auto_videur" autofocus>Oui
				                @error('auto_videur')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

				        <div class="form-group row">
				            <label for="hors_bord" class="col-md-4 col-form-label text-md-right">Hors-bord ?</label>

				            <div class="col-md-6">
				                <input id="hors_bord" type="radio" class="" name="hors_bord" value="0" required autocomplete="hors_bord" autofocus checked>Non
				                <input id="hors_bord" type="radio" class="" name="hors_bord" value="1" required autocomplete="hors_bord" autofocus>Oui
				                @error('hors_bord')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

				        <div class="form-group row">
				            <label for="francise" class="col-md-4 col-form-label text-md-right">Françisé ?</label>

				            <div class="col-md-6">
				                <input id="francise" type="radio" class="" name="francise" value="0" required autocomplete="francise" autofocus checked>Non
				                <input id="francise" type="radio" class="" name="francise" value="1" required autocomplete="francise" autofocus>Oui
				                @error('francise')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

					<div class="form-group row">
				            <label for="distance_eloignement" class="col-md-4 col-form-label text-md-right">Distance d'éloignement (en km)</label>

				            <div class="col-md-6">
				                <input id="distance_eloignement" type="number" min="0" class="form-control @error('distance_eloignement') is-invalid @enderror" name="distance_eloignement" value="{{ old('distance_eloignement') }}" required autocomplete="distance_eloignement" autofocus>

				                @error('distance_eloignement')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

					<div class="form-group row">
				            <label for="nb_places" class="col-md-4 col-form-label text-md-right">Nombre de places</label>

				            <div class="col-md-6">
				                <input id="nb_places" type="number" min="1" class="form-control @error('nb_places') is-invalid @enderror" name="nb_places" value="{{ old('nb_places') }}" required autocomplete="nb_places" autofocus>

				                @error('nb_places')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

					<div class="form-group row">
				            <label for="force_vent_max" class="col-md-4 col-form-label text-md-right">Résistance au vent</label>

				            <div class="col-md-6">
				                <input id="force_vent_max" type="number" min="1" class="form-control @error('force_vent_max') is-invalid @enderror" name="force_vent_max" value="{{ old('force_vent_max') }}" required autocomplete="force_vent_max" autofocus>

				                @error('force_vent_max')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

					<div class="form-group row">
				            <label for="hauteur_max_vagues" class="col-md-4 col-form-label text-md-right">Hauteur maximale des vagues (en m)</label>

				            <div class="col-md-6">
				                <input id="hauteur_max_vagues" type="number" min="0" step="0.2" class="form-control @error('hauteur_max_vagues') is-invalid @enderror" name="hauteur_max_vagues" value="{{ old('hauteur_max_vagues') }}" required autocomplete="hauteur_max_vagues" autofocus>

				                @error('hauteur_max_vagues')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

					<div class="form-group row">
				            <label for="niveau_performance" class="col-md-4 col-form-label text-md-right">Niveau performance (en %)</label>

				            <div class="col-md-6">
				                <input id="niveau_performance" type="number" min="1" max="100" class="form-control @error('niveau_performance') is-invalid @enderror" name="niveau_performance" value="{{ old('niveau_performance') }}" required autocomplete="niveau_performance" autofocus>

				                @error('niveau_performance')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

					<div class="form-group row">
				            <label for="jauge_brut" class="col-md-4 col-form-label text-md-right">Jauge brute (en L)</label>

				            <div class="col-md-6">
				                <input id="jauge_brut" type="number" min="1" class="form-control @error('jauge_brut') is-invalid @enderror" name="jauge_brut" value="{{ old('jauge_brut') }}" required autocomplete="jauge_brut" autofocus>

				                @error('jauge_brut')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

					<div class="form-group row">
				            <label for="niveau_carburant_max" class="col-md-4 col-form-label text-md-right">Niveau Carburant max (en L)</label>

				            <div class="col-md-6">
				                <input id="niveau_carburant_max" type="number" min="1" class="form-control @error('niveau_carburant_max') is-invalid @enderror" name="niveau_carburant_max" value="{{ old('niveau_carburant_max') }}" required autocomplete="niveau_carburant_max" autofocus>

				                @error('niveau_carburant_max')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

					<div class="form-group row">
				            <label for="niveau_huile" class="col-md-4 col-form-label text-md-right">Niveau huile (en L)</label>

				            <div class="col-md-6">
				                <input id="niveau_huile" type="number" min="1" class="form-control @error('niveau_huile') is-invalid @enderror" name="niveau_huile" value="{{ old('niveau_huile') }}" required autocomplete="niveau_huile" autofocus>

				                @error('niveau_huile')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

					<div class="form-group row">
				            <label for="niveau_reserve" class="col-md-4 col-form-label text-md-right">Niveau de la réserve (en L)</label>

				            <div class="col-md-6">
				                <input id="niveau_reserve" type="number" min="1" class="form-control @error('niveau_reserve') is-invalid @enderror" name="niveau_reserve" value="{{ old('niveau_reserve') }}" required autocomplete="niveau_reverve" autofocus>

				                @error('niveau_reserve')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

					<div class="form-group row">
				            <label for="jauge_liquide_refroidissement" class="col-md-4 col-form-label text-md-right">Jauge Liquide de refroidissement (en L)</label>

				            <div class="col-md-6">
				                <input id="jauge_liquide_refroidissement" type="number" min="1" class="form-control @error('jauge_liquide_refroidissement') is-invalid @enderror" name="jauge_liquide_refroidissement" value="{{ old('jauge_liquide_refroidissement') }}" required autocomplete="jauge_liquide_refroidissement" autofocus>

				                @error('jauge_liquide_refroidissement')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

					<div class="form-group row">
				            <label for="nb_mat" class="col-md-4 col-form-label text-md-right">Nombre de mats</label>

				            <div class="col-md-6">
				                <input id="nb_mat" type="number" min="0" class="form-control @error('nb_mat') is-invalid @enderror" name="nb_mat" value="{{ old('nb_mat') }}" required autocomplete="nb_mat" autofocus>

				                @error('nb_mat')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

					<div class="form-group row">
				            <label for="surface_voilure" class="col-md-4 col-form-label text-md-right">Surface des voiles cumulées (en mètres carrés)</label>

				            <div class="col-md-6">
				                <input id="surface_voilure" type="number" min="0" class="form-control @error('surface_voilure') is-invalid @enderror" name="surface_voilure" value="{{ old('surface_voilure') }}" required autocomplete="surface_voilure" autofocus>

				                @error('surface_voilure')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

					<div class="form-group row">
				            <label for="dimension_x_bateau" class="col-md-4 col-form-label text-md-right">Longueur (en m) </label>

				            <div class="col-md-6">
				                <input id="dimension_x_bateau" type="number" min="1" class="form-control @error('dimension_x_bateau') is-invalid @enderror" name="dimension_x_bateau" value="{{ old('dimension_x_bateau') }}" required autocomplete="dimension_x_bateau" autofocus>

				                @error('dimension_x_bateau')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

					<div class="form-group row">
				            <label for="dimension_y_bateau" class="col-md-4 col-form-label text-md-right">Largeur (en m)</label>

				            <div class="col-md-6">
				                <input id="dimension_y_bateau" type="number" min="1" class="form-control @error('dimension_y_bateau') is-invalid @enderror" name="dimension_y_bateau" value="{{ old('dimension_y_bateau') }}" required autocomplete="dimension_y_bateau" autofocus>

				                @error('dimension_y_bateau')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

					<div class="form-group row">
				            <label for="dimension_z_bateau" class="col-md-4 col-form-label text-md-right">Hauteur (en m)</label>

				            <div class="col-md-6">
				                <input id="dimension_z_bateau" type="number" min="1" class="form-control @error('dimension_z_bateau') is-invalid @enderror" name="dimension_z_bateau" value="{{ old('dimension_z_bateau') }}" required autocomplete="dimension_z_bateau" autofocus>

				                @error('dimension_z_bateau')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

					<div class="form-group row">
				            <label for="volume_coque" class="col-md-4 col-form-label text-md-right">Volume coque (en mètres cubes)</label>

				            <div class="col-md-6">
				                <input id="volume_coque" type="number" min="1" class="form-control @error('volume_coque') is-invalid @enderror" name="volume_coque" value="{{ old('volume_coque') }}" required autocomplete="volume_coque" autofocus>

				                @error('volume_coque')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

					<div class="form-group row">
				            <label for="masse_navire" class="col-md-4 col-form-label text-md-right">Masse du navire (en kg)</label>

				            <div class="col-md-6">
				                <input id="masse_navire" type="number" min="1" class="form-control @error('masse_navire') is-invalid @enderror" name="masse_navire" value="{{ old('masse_navire') }}" required autocomplete="masse_navire" autofocus>

				                @error('masse_navire')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

					<div class="form-group row">
				            <label for="consommation" class="col-md-4 col-form-label text-md-right">Consommation (en L/km)</label>

				            <div class="col-md-6">
				                <input id="consommation" type="number" min="1" class="form-control @error('consommation') is-invalid @enderror" name="consommation" value="{{ old('consommation') }}" required autocomplete="consommation" autofocus>

				                @error('consommation')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

				        <div class="form-group row mb-0">
				            <div class="col-md-6 offset-md-4">
				                <button type="submit" class="btn btn-secondary">
				                    {{ __('Créer le bateau') }}
				                </button>
				            </div>
				        </div>
				    </form>
				</div>
			    </div>
			</div>
		    </div>
		</div>
	</main>
@endsection
