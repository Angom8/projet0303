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
			

				    <h2>Ajouter un équipement</h2>
				    <form method="POST" action="{{ route('boat.admin.updating.equip') }}">
				        @csrf

				        <div class="form-group row">
				    
				                <input id="id_bateau" type="hidden" class="form-control @error('id_bateau') is-invalid @enderror" name="id_bateau" value="{{ $boat }}" required autocomplete="id_bateau" autofocus>

				        </div>

				        <div class="form-group row">
				            <label for="nom_type_equipement" class="col-md-4 col-form-label text-md-right">Type de l'équipement</label>

				            <div class="col-md-6">
				                <input id="nom_type_equipement" type="text" class="form-control @error('nom_type_equipement') is-invalid @enderror" name="nom_type_equipement" value="{{ old('nom_type_equipement') }}" required autocomplete="nom_type_equipement" autofocus>

				                @error('nom_type_equipement')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>


					<div class="form-group row">
				            <label for="nom_marque" class="col-md-4 col-form-label text-md-right">{{ __('Marque') }}</label>

				            <div class="col-md-6">
				                <input id="nom_marque" type="text" class="form-control @error('nom_marque') is-invalid @enderror" name="nom_marque" value="{{ old('nom_marque') }}" required autocomplete="nom_marque" autofocus>

				                @error('nom_marque')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				    


					<div class="form-group row">
				            <label for="nom_modele" class="col-md-4 col-form-label text-md-right">{{ __('Modele') }}</label>

				            <div class="col-md-6">
				                <input id="nom_modele" type="text" class="form-control @error('nom_modele') is-invalid @enderror" name="nom_modele" value="{{ old('nom_modele') }}" required autocomplete="nom_modele" autofocus>

				                @error('nom_modele')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				   


					<div class="form-group row">
				            <label for="desc_etat" class="col-md-4 col-form-label text-md-right">{{ __('Etat') }}</label>

				            <div class="col-md-6">
				                <input id="desc_etat" type="text" class="form-control @error('desc_etat') is-invalid @enderror" name="desc_etat" value="{{ old('desc_etat') }}" required autocomplete="desc_etat" autofocus>

				                @error('desc_etat')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				    

				
					<div class="form-group row">
				            <label for="duree_vie_equip" class="col-md-4 col-form-label text-md-right">{{ __('Durée de vie (Années)') }}</label>

				            <div class="col-md-6">
				                <input id="duree_vie_equip" type="number" step="0.1" min="0" class="form-control @error('duree_vie_equip') is-invalid @enderror" name="duree_vie_equip" value="{{ old('duree_vie_equip') }}" required autocomplete="duree_vie_equip" autofocus>

				                @error('duree_vie_equip')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				    

					<div class="form-group row">
				            <label for="revision_periodique_equip" class="col-md-4 col-form-label text-md-right">{{ __('Révisions périodiques (Mois)') }}</label>

				            <div class="col-md-6">
				                <input id="revision_periodique_equip" type="number" step="0.5"  min="0"  class="form-control @error('revision_periodique_equip') is-invalid @enderror" name="revision_periodique_equip" value="{{ old('revision_periodique_equip') }}" required autocomplete="revision_periodique_equip" autofocus>

				                @error('revision_periodique_equip')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				    

					<div class="form-group row">
				            <label for="quantite_equip" class="col-md-4 col-form-label text-md-right">{{ __('Quantité') }}</label>

				            <div class="col-md-6">
				                <input id="quantite_equip" type="number" min="1"  class="form-control @error('quantite_equip') is-invalid @enderror" name="quantite_equip" value="{{ old('quantite_equip') }}" required autocomplete="quantite_equip" autofocus>

				                @error('quantite_equip')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				    

					<div class="form-group row">
				            <label for="equip_origine" class="col-md-4 col-form-label text-md-right">D'origine ?</label>

				            <div class="col-md-6">
				                <input id="equip_origine" type="radio" class="" name="equip_origine" value="0" required autocomplete="equip_origine" autofocus checked>Non
				                <input id="equip_origine" type="radio" class="" name="equip_origine" value="1" required autocomplete="equip_origine" autofocus>Oui
				                @error('equip_origine')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>


					<div class="form-group row">
				            <label for="q_equip_rechange" class="col-md-4 col-form-label text-md-right">{{ __('Quantité en rechange') }}</label>

				            <div class="col-md-6">
				                <input id="q_equip_rechange" type="number" min="0"  class="form-control @error('q_equip_rechange') is-invalid @enderror" name="q_equip_rechange" value="{{ old('q_equip_rechange') }}" required autocomplete="q_equip_rechange" autofocus>

				                @error('q_equip_rechange')
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
				            <label for="updated_at" class="col-md-4 col-form-label text-md-right">Date de dernier entretien</label>

				            <div class="col-md-6">
				                <input id="updated_at" type="date"  class="form-control @error('updated_at') is-invalid @enderror" name="updated_at" required  autocomplete="updated_at" autofocus>

				                @error('updated_at')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
					<div class="form-group row mb-0">
				            <div class="col-md-6 offset-md-4">
				                <button type="submit" class="btn btn-secondary">
				                    Ajouter l'équipement au bateau
				                </button>
						 </div>
				        </div>    
				    </form>

				    <h2>Ajouter une pièce</h2>

<!-- ----------------------------------------------------------------  -->

		    <form method="POST" action="{{ route('boat.admin.updating.piece') }}">
				        @csrf

				        <div class="form-group row">
				    
				                <input id="id_bateau" type="hidden" class="form-control @error('id_bateau') is-invalid @enderror" name="id_bateau" value="{{ $boat }}" required autocomplete="id_bateau" autofocus>

				        </div>

				        <div class="form-group row">
				            <label for="nom_type_piece" class="col-md-4 col-form-label text-md-right">Type de la pièce</label>

				            <div class="col-md-6">
				                <input id="nom_type_piece" type="text" class="form-control @error('nom_type_piece') is-invalid @enderror" name="nom_type_piece" value="{{ old('nom_type_piece') }}" required autocomplete="nom_type_piece" autofocus>

				                @error('nom_type_piece')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>


					<div class="form-group row">
				            <label for="nom_marque" class="col-md-4 col-form-label text-md-right">{{ __('Marque') }}</label>

				            <div class="col-md-6">
				                <input id="nom_marque" type="text" class="form-control @error('nom_marque') is-invalid @enderror" name="nom_marque" value="{{ old('nom_marque') }}" required autocomplete="nom_marque" autofocus>

				                @error('nom_marque')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				    


					<div class="form-group row">
				            <label for="nom_modele" class="col-md-4 col-form-label text-md-right">{{ __('Modele') }}</label>

				            <div class="col-md-6">
				                <input id="nom_modele" type="text" class="form-control @error('nom_modele') is-invalid @enderror" name="nom_modele" value="{{ old('nom_modele') }}" required autocomplete="nom_modele" autofocus>

				                @error('nom_modele')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				   


					<div class="form-group row">
				            <label for="desc_etat" class="col-md-4 col-form-label text-md-right">{{ __('Etat') }}</label>

				            <div class="col-md-6">
				                <input id="desc_etat" type="text" class="form-control @error('desc_etat') is-invalid @enderror" name="desc_etat" value="{{ old('desc_etat') }}" required autocomplete="desc_etat" autofocus>

				                @error('desc_etat')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				    

				
					<div class="form-group row">
				            <label for="duree_vie_piece" class="col-md-4 col-form-label text-md-right">{{ __('Durée de vie (Années)') }}</label>

				            <div class="col-md-6">
				                <input id="duree_vie_piece" type="number" step="0.1" min="0" class="form-control @error('duree_vie_piece') is-invalid @enderror" name="duree_vie_piece" value="{{ old('duree_vie_piece') }}" required autocomplete="duree_vie_piece" autofocus>

				                @error('duree_vie_piece')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				    

					<div class="form-group row">
				            <label for="revision_periodique_piece" class="col-md-4 col-form-label text-md-right">{{ __('Révisions périodiques (Mois)') }}</label>

				            <div class="col-md-6">
				                <input id="revision_periodique_piece" type="number" step="0.5"  min="0"  class="form-control @error('revision_periodique_piece') is-invalid @enderror" name="revision_periodique_piece" value="{{ old('revision_periodique_piece') }}" required autocomplete="revision_periodique_piece" autofocus>

				                @error('revision_periodique_piece')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				    

					<div class="form-group row">
				            <label for="quantite_piece" class="col-md-4 col-form-label text-md-right">{{ __('Quantité') }}</label>

				            <div class="col-md-6">
				                <input id="quantite_piece" type="number" min="1"  class="form-control @error('quantite_piece') is-invalid @enderror" name="quantite_piece" value="{{ old('quantite_piece') }}" required autocomplete="quantite_piece" autofocus>

				                @error('quantite_piece')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				    

					<div class="form-group row">
				            <label for="piece_origine" class="col-md-4 col-form-label text-md-right">D'origine ?</label>

				            <div class="col-md-6">
				                <input id="piece_origine" type="radio" class="" name="piece_origine" value="0" required autocomplete="piece_origine" autofocus checked>Non
				                <input id="piece_origine" type="radio" class="" name="piece_origine" value="1" required autocomplete="piece_origine" autofocus>Oui
				                @error('piece_origine')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>


					<div class="form-group row">
				            <label for="q_piece_rechange" class="col-md-4 col-form-label text-md-right">{{ __('Quantité en rechange') }}</label>

				            <div class="col-md-6">
				                <input id="q_piece_rechange" type="number" min="0"  class="form-control @error('q_piece_rechange') is-invalid @enderror" name="q_piece_rechange" value="{{ old('q_piece_rechange') }}" required autocomplete="q_piece_rechange" autofocus>

				                @error('q_piece_rechange')
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
				            <label for="updated_at" class="col-md-4 col-form-label text-md-right">Date de dernier entretien</label>

				            <div class="col-md-6">
				                <input id="updated_at" type="date"  class="form-control @error('updated_at') is-invalid @enderror" name="updated_at" required  autocomplete="updated_at" autofocus>

				                @error('updated_at')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
					<div class="form-group row mb-0">
				            <div class="col-md-6 offset-md-4">
				                <button type="submit" class="btn btn-secondary">
				                    Ajouter la pièce au bateau
				                </button>
						 </div>
				        </div>    
				    </form>
				@if(isset($moteur) and $moteur!=null)
				    <h2>Ajouter un moteur</h2>
				    <form method="POST" action="{{ route('boat.admin.updating.moteur') }}">
				        @csrf

				        <div class="form-group row">
				    
				                <input id="id_bateau" type="hidden" class="form-control @error('id_bateau') is-invalid @enderror" name="id_bateau" value="{{ $boat }}" required autocomplete="id_bateau" autofocus>

				        </div>

				        <div class="form-group row">
				            <label for="nom_type_equipement" class="col-md-4 col-form-label text-md-right">Type de l'équipement</label>

				            <div class="col-md-6">
				                <input id="nom_type_equipement" type="text" class="form-control @error('nom_type_equipement') is-invalid @enderror" name="nom_type_equipement" value="{{ old('nom_type_equipement') }}" required autocomplete="nom_type_equipement" autofocus>

				                @error('nom_type_equipement')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>


					<div class="form-group row">
				            <label for="nom_marque" class="col-md-4 col-form-label text-md-right">{{ __('Marque') }}</label>

				            <div class="col-md-6">
				                <input id="nom_marque" type="text" class="form-control @error('nom_marque') is-invalid @enderror" name="nom_marque" value="{{ old('nom_marque') }}" required autocomplete="nom_marque" autofocus>

				                @error('nom_marque')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				    


					<div class="form-group row">
				            <label for="nom_modele" class="col-md-4 col-form-label text-md-right">{{ __('Modele') }}</label>

				            <div class="col-md-6">
				                <input id="nom_modele" type="text" class="form-control @error('nom_modele') is-invalid @enderror" name="nom_modele" value="{{ old('nom_modele') }}" required autocomplete="nom_modele" autofocus>

				                @error('nom_modele')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				   
					<div class="form-group row">
				            <label for="horametre_compte" class="col-md-4 col-form-label text-md-right">{{ __('Horamètre') }}</label>

				            <div class="col-md-6">
				                <input id="horametre_compte" type="number" min="0"  class="form-control @error('horametre_compte') is-invalid @enderror" name="horametre_compte" value="{{ old('horametre_compte') }}" required autocomplete="horametre_compte" autofocus>

				                @error('horametre_compte')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
					<div class="form-group row">
				            <label for="puissance_moteur" class="col-md-4 col-form-label text-md-right">{{ __('Puissance moteur') }}</label>

				            <div class="col-md-6">
				                <input id="puissance_moteur" type="number" min="0"  class="form-control @error('puissance_moteur') is-invalid @enderror" name="puissance_moteur" value="{{ old('puissance_moteur') }}" required autocomplete="puissance_moteur" autofocus>

				                @error('puissance_moteur')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
					<div class="form-group row">
				            <label for="kilometrage" class="col-md-4 col-form-label text-md-right">{{ __('Kilomètrage') }}</label>

				            <div class="col-md-6">
				                <input id="kilometrage" type="number" min="0"  class="form-control @error('kilometrage') is-invalid @enderror" name="kilometrage" value="{{ old('kilometrage') }}" required autocomplete="kilometrage" autofocus>

				                @error('kilometrage')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
					<div class="form-group row">
				            <label for="desc_etat" class="col-md-4 col-form-label text-md-right">{{ __('Etat') }}</label>

				            <div class="col-md-6">
				                <input id="desc_etat" type="text" class="form-control @error('desc_etat') is-invalid @enderror" name="desc_etat" value="{{ old('desc_etat') }}" required autocomplete="desc_etat" autofocus>

				                @error('desc_etat')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				    

				
					<div class="form-group row">
				            <label for="duree_vie_equip" class="col-md-4 col-form-label text-md-right">{{ __('Durée de vie (Années)') }}</label>

				            <div class="col-md-6">
				                <input id="duree_vie_equip" type="number" step="0.1" min="0" class="form-control @error('duree_vie_equip') is-invalid @enderror" name="duree_vie_equip" value="{{ old('duree_vie_equip') }}" required autocomplete="duree_vie_equip" autofocus>

				                @error('duree_vie_equip')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				    

					<div class="form-group row">
				            <label for="revision_periodique_equip" class="col-md-4 col-form-label text-md-right">{{ __('Révisions périodiques (Mois)') }}</label>

				            <div class="col-md-6">
				                <input id="revision_periodique_equip" type="number" step="0.5"  min="0"  class="form-control @error('revision_periodique_equip') is-invalid @enderror" name="revision_periodique_equip" value="{{ old('revision_periodique_equip') }}" required autocomplete="revision_periodique_equip" autofocus>

				                @error('revision_periodique_equip')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				    

					<div class="form-group row">
				            <label for="quantite_equip" class="col-md-4 col-form-label text-md-right">{{ __('Quantité') }}</label>

				            <div class="col-md-6">
				                <input id="quantite_equip" type="number" min="1"  class="form-control @error('quantite_equip') is-invalid @enderror" name="quantite_equip" value="{{ old('quantite_equip') }}" required autocomplete="quantite_equip" autofocus>

				                @error('quantite_equip')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				    

					<div class="form-group row">
				            <label for="equip_origine" class="col-md-4 col-form-label text-md-right">D'origine ?</label>

				            <div class="col-md-6">
				                <input id="equip_origine" type="radio" class="" name="equip_origine" value="0" required autocomplete="equip_origine" autofocus checked>Non
				                <input id="equip_origine" type="radio" class="" name="equip_origine" value="1" required autocomplete="equip_origine" autofocus>Oui
				                @error('equip_origine')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>


					<div class="form-group row">
				            <label for="q_equip_rechange" class="col-md-4 col-form-label text-md-right">{{ __('Quantité en rechange') }}</label>

				            <div class="col-md-6">
				                <input id="q_equip_rechange" type="number" min="0"  class="form-control @error('q_equip_rechange') is-invalid @enderror" name="q_equip_rechange" value="{{ old('q_equip_rechange') }}" required autocomplete="q_equip_rechange" autofocus>

				                @error('q_equip_rechange')
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
				            <label for="updated_at" class="col-md-4 col-form-label text-md-right">Date de dernier entretien</label>

				            <div class="col-md-6">
				                <input id="updated_at" type="date"  class="form-control @error('updated_at') is-invalid @enderror" name="updated_at" required  autocomplete="updated_at" autofocus>

				                @error('updated_at')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
					<div class="form-group row mb-0">
				            <div class="col-md-6 offset-md-4">
				                <button type="submit" class="btn btn-secondary">
				                    Ajouter le moteur au bateau
				                </button>
						 </div>
				        </div>    
				    </form>


				@endif


				@if(isset($equipements) and $equipements!=null)
				     <h2>Ajouter une pièce à un équipement</h2>

				    <form method="POST" action="{{ route('boat.admin.updating.pieceequip') }}">
				        @csrf
					<div class="form-group row">
				            <label for="equip" class="col-md-4 col-form-label text-md-right">{{ __('Equipement concerné') }}</label>

				            <div class="col-md-6">
						 <select  id="equip" class="form-control @error('equip') is-invalid @enderror" name="equip" value="{{ old('equip') }}" required autocomplete="equip" size="3">
							@foreach($equipements as $equip)
								<option value="{{ $equip['equipement'] }}">{{ $equip['equipement'] }}</option>
								
							@endforeach
						 
						 </select> 

				                @error('equip')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
					<div class="form-group row">
				            <label for="nom_type_piece" class="col-md-4 col-form-label text-md-right">Type de la pièce</label>

				            <div class="col-md-6">
				                <input id="nom_type_piece" type="text" class="form-control @error('nom_type_piece') is-invalid @enderror" name="nom_type_piece" value="{{ old('nom_type_piece') }}" required autocomplete="nom_type_piece" autofocus>

				                @error('nom_type_piece')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>


					<div class="form-group row">
				            <label for="nom_marque" class="col-md-4 col-form-label text-md-right">{{ __('Marque') }}</label>

				            <div class="col-md-6">
				                <input id="nom_marque" type="text" class="form-control @error('nom_marque') is-invalid @enderror" name="nom_marque" value="{{ old('nom_marque') }}" required autocomplete="nom_marque" autofocus>

				                @error('nom_marque')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				    


					<div class="form-group row">
				            <label for="nom_modele" class="col-md-4 col-form-label text-md-right">{{ __('Modele') }}</label>

				            <div class="col-md-6">
				                <input id="nom_modele" type="text" class="form-control @error('nom_modele') is-invalid @enderror" name="nom_modele" value="{{ old('nom_modele') }}" required autocomplete="nom_modele" autofocus>

				                @error('nom_modele')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				   


					<div class="form-group row">
				            <label for="desc_etat" class="col-md-4 col-form-label text-md-right">{{ __('Etat') }}</label>

				            <div class="col-md-6">
				                <input id="desc_etat" type="text" class="form-control @error('desc_etat') is-invalid @enderror" name="desc_etat" value="{{ old('desc_etat') }}" required autocomplete="desc_etat" autofocus>

				                @error('desc_etat')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				    

				
					<div class="form-group row">
				            <label for="duree_vie_piece" class="col-md-4 col-form-label text-md-right">{{ __('Durée de vie (Années)') }}</label>

				            <div class="col-md-6">
				                <input id="duree_vie_piece" type="number" step="0.1" min="0" class="form-control @error('duree_vie_piece') is-invalid @enderror" name="duree_vie_piece" value="{{ old('duree_vie_piece') }}" required autocomplete="duree_vie_piece" autofocus>

				                @error('duree_vie_piece')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				    

					<div class="form-group row">
				            <label for="revision_periodique_piece" class="col-md-4 col-form-label text-md-right">{{ __('Révisions périodiques (Mois)') }}</label>

				            <div class="col-md-6">
				                <input id="revision_periodique_piece" type="number" step="0.5"  min="0"  class="form-control @error('revision_periodique_piece') is-invalid @enderror" name="revision_periodique_piece" value="{{ old('revision_periodique_piece') }}" required autocomplete="revision_periodique_piece" autofocus>

				                @error('revision_periodique_piece')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				    

					<div class="form-group row">
				            <label for="quantite_piece" class="col-md-4 col-form-label text-md-right">{{ __('Quantité') }}</label>

				            <div class="col-md-6">
				                <input id="quantite_piece" type="number" min="1"  class="form-control @error('quantite_piece') is-invalid @enderror" name="quantite_piece" value="{{ old('quantite_piece') }}" required autocomplete="quantite_piece" autofocus>

				                @error('quantite_piece')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				    

					<div class="form-group row">
				            <label for="piece_origine" class="col-md-4 col-form-label text-md-right">D'origine ?</label>

				            <div class="col-md-6">
				                <input id="piece_origine" type="radio" class="" name="piece_origine" value="0" required autocomplete="piece_origine" autofocus checked>Non
				                <input id="piece_origine" type="radio" class="" name="piece_origine" value="1" required autocomplete="piece_origine" autofocus>Oui
				                @error('piece_origine')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>


					<div class="form-group row">
				            <label for="q_piece_rechange" class="col-md-4 col-form-label text-md-right">{{ __('Quantité en rechange') }}</label>

				            <div class="col-md-6">
				                <input id="q_piece_rechange" type="number" min="0"  class="form-control @error('q_piece_rechange') is-invalid @enderror" name="q_piece_rechange" value="{{ old('q_piece_rechange') }}" required autocomplete="q_piece_rechange" autofocus>

				                @error('q_piece_rechange')
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
				            <label for="updated_at" class="col-md-4 col-form-label text-md-right">Date de dernier entretien</label>

				            <div class="col-md-6">
				                <input id="updated_at" type="date"  class="form-control @error('updated_at') is-invalid @enderror" name="updated_at" required  autocomplete="updated_at" autofocus>

				                @error('updated_at')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
					<div class="form-group row mb-0">
				            <div class="col-md-6 offset-md-4">
				                <button type="submit" class="btn btn-secondary">
				                    Ajouter la pièce à l'équipement
				                </button>
						</div>
				       	 </div> 
					</form>   

					@endif
				</div>
			    </div>
			</div>
		    </div>
		</div>
	</main>
@endsection
