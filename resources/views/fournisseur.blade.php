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
					</div>
				</div>
			</div>
		</section>
		

		</div>
	 </div>
 </main>
@endsection
