@extends('layouts.admin')
@section('title')
Fournisseur
@endsection
@section('content')

<main>

	<div class ="content">
		<div class="container">
		  <h1>{{ $fourni->nom_fourni}}</h1>
			{{ getCreateFournisseur(Auth::user()->type_utilisateur) }}

		<section id="user">
			<div>
				<div class="card container">
					<div class="card-body">
						<p class="lead">Fournisseur</p>
						<p><strong>Dernière mise à jour du profil</strong> : {{ $fourni->updated_at }}</p>
						<p><strong>Inscription</strong> : {{ $fourni->created_at }}</p>
						<p><strong>Id </strong>: {{ $fourni->id_fourni }}</p>
						<p><strong>Adresse mail </strong>: {{ $fourni->mail_fourni }}</p>
						<p><strong>Numéro de téléphone </strong>: {{ $fourni->tel_fourni }}</p>
						<p><strong>Adresse(s) </strong>:</p>
						<ul>
							@if($franchise)
								@foreach ($franchise as $localisation)
									<li>{{ $localisation['ville'] }}</li>
									<ul>
										<li>{{ $localisation['pays'] }}</li>
										<li>{{ $localisation['code_postal'] }}</li>
										<li>{{ $localisation['numero_adresse'] }} {{ $localisation['voierie'] }}</li>
									</ul>
								@endforeach
							@else
								<li>L'adresse de ce contact n'a encore pas été précisée</li>
							@endif
						</ul>	
						<p><strong>Pièces et Equipements fournis </strong>: </p>
						<ul>
							@if($piece)
								@foreach ($piece as $p)
									<li>{{ $p }}</a></li>
								@endforeach
							@else
								<li>Les Pièces fournies par ce contact n'ont pas été précisées</li>
							@endif
							@if($equipement)
								@foreach ($equipement as $eq)
									<li>{{ $eq }}</a></li>
								@endforeach
							@else
								<li>Les Equipements fournis par ce contact n'ont pas été précisés</li>
							@endif

						</ul>
					
					@if(Auth::user()->type_utilisateur == 2 and $listePiece != null)
				    <form method="POST" action="{{ route('fourni.add.piece') }}">
					<h2>{{ __('Ajouter une pièce') }}</h2>
				        @csrf
  					<input id="id_fourni" type="hidden" class="form-control @error('id_fourni') is-invalid @enderror" name="id_fourni" value="{{ $fourni->id_fourni }}" required autocomplete="id_fourni" autofocus>
				        <div class="form-group row">
				            <label for="id_type_piece" class="col-md-4 col-form-label text-md-right">{{ __('Choix du type de pièce') }}</label>

				            <div class="col-md-6">
				                 <select  id="id_type_piece" class="form-control @error('id_type_piece') is-invalid @enderror" name="id_type_piece" value="{{ old('id_type_piece') }}" required autocomplete="id_type_piece" size="3">
							@foreach($listePiece as $piece)
								<option value="{{ $piece['id_type_piece'] }}">{{ $piece['nom_type_piece'] }}</option>
								
							@endforeach
						 
						 </select> 
				                @error('id_type_piece')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>


				        <div class="form-group row mb-0">
				            <div class="col-md-6 offset-md-4">
				                <button type="submit" class="btn btn-secondary">
				                    {{ __('Ajouter une pièce') }}
				                </button>
				            </div>
				        </div>
				    </form>
					@endif
					@if(Auth::user()->type_utilisateur == 2 and $listeEquip  != null)
				    <form method="POST" action="{{ route('fourni.add.equip') }}">
					<h2>{{ __('Ajouter un équipement') }}</h2>
				        @csrf
  					<input id="id_fourni" type="hidden" class="form-control @error('id_fourni') is-invalid @enderror" name="id_fourni" value="{{ $fourni->id_fourni }}" required autocomplete="id_fourni" autofocus>
				        <div class="form-group row">
				            <label for="id_type_equip" class="col-md-4 col-form-label text-md-right">Choix du type d'équipement</label>

				            <div class="col-md-6">
				                 <select  id="id_type_equip" class="form-control @error('id_type_equip') is-invalid @enderror" name="id_type_equip" value="{{ old('id_type_equip') }}" required autocomplete="id_type_equip" size="3">
							@foreach($listeEquip as $equip)
								<option value="{{ $equip['id_type_equipement'] }}">{{ $equip['nom_type_equipement'] }}</option>
								
							@endforeach
						 
						 </select> 
				                @error('id_type_equip')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>


				        <div class="form-group row mb-0">
				            <div class="col-md-6 offset-md-4">
				                <button type="submit" class="btn btn-secondary">
				                    {{ __('Ajouter un équipement') }}
				                </button>
				            </div>
				        </div>
				    </form>
					@endif
					</div>
				</div>
			</div>
		</section>
		

		</div>
	 </div>
 </main>
@endsection
