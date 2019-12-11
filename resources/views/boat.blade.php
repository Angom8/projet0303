@extends('layouts.admin')
@section('title')
Bateau
@endsection
@section('content')

<main>

	<div class ="content">
		<div class="container">
		  <h1>{{ $boat['nom_bateau'] }}</h1>
			{{ getCreateBoat(Auth::user()->type_utilisateur) }}
			@if(Auth::user()->type_utilisateur == 2)
			<div class="text-right bato-row">
				<a class="btn btn-warning" href="{{ url('admin/update-boat/'.$boat['id_bateau']) }}">Mettre à jour</a>
		 	</div>
			@endif

		<section id="user">
			<div>
				<div class="card container">
					<div class="card-body">
						<img class="img-boat ml-auto" src="{{ $boat['url_photo'] }}">
						<h2>Bateau - Navigation <span id="autorisation"></span></h2>
						<p><strong>Dernier entretien</strong> : {{ $boat['updated_at'] }}</p>
						<p><strong>Inscription</strong> : {{ $boat['created_at'] }}</p>
						<p><strong>Id </strong>: {{ $boat['id_bateau'] }}</p>
						<p><strong>Immatriculation </strong>: {{ $immatr['id_immatr'] }}</p>
						<p><strong>Date Immatriculation </strong>: {{ $immatr['date_immatr'] }}</p>
						<p><strong>Distance d'éloignement </strong>: {{ $boat['distance_eloignement'] }}milles</p>
				
						@if($boat['force_vent_max'] < 4 or $boat['hauteur_max_vagues'] < 0.5)
						<?php $unvalid = 1?>
						@else
							@if($boat['hauteur_max_vagues'] > 6 and $boat['hauteur_max_vagues'] > 2)
								@if($boat['force_vent_max'] < 8 and $boat['hauteur_max_vagues'] < 4)
									<p><strong>Catégorie </strong>: C</p>
								@else
									@if($boat['distance_eloignement'] > 60)
									<p><strong>Catégorie </strong>: A</p>
									@else
									<p><strong>Catégorie </strong>: B</p>
									@endif
								@endif
								
							@else
								<p><strong>Catégorie </strong>: D</p>
							@endif
						@endif
								
						<p><strong>Ancienne catégorie </strong>: {{ $boat['ancienne_cat'] }}</p>
						@if($boat['auto_videur'] == 1)<p><strong>Auto-videur </strong></p>@endif
						@if($boat['hors_bord'] == 1)<p><strong>Hord-bord</strong></p>@endif
						@if($boat['francise'] == 1)<p><strong>Francisé</strong></p>@endif
						<p><strong>Nombre de places </strong>: {{ $boat['nb_places'] }}</p>
						<h2>Jauges</h2>
						<p><strong>Niveau de la réserve </strong>: {{ $boat['niveau_reserve'] }}L
						@if($boat['niveau_reserve']<5)
							<span class="boat-warning">Niveau de reserve bas</span>
							<?php $unvalid = 1?>
						@endif
						</p>
						<p><strong>Niveau de carburant max </strong>: {{ $boat['niveau_carburant_max'] }}L</p>
						<p><strong>Jauge brute </strong>: {{ $boat['jauge_brut'] }}L</p>
						<p><strong>Niveau du liquide de refroidissement </strong>: {{ $boat['jauge_liquide_refroidissement'] }}L</p>
						@if($boat['jauge_liquide_refroidissement']<5)
							<span class="boat-warning">Niveau bas</span>
							<?php $unvalid = 1?>
						@endif
						<p><strong>Consommation </strong>: {{ $boat['consommation'] }}l/km</p>
						<h2>Caractéristiques techniques</h2>
						<p><strong>Niveau de Performance </strong>: {{ $boat['niveau_performance'] }}</p>
						<p><strong>Nombre de mats </strong>: {{ $boat['nb_mat'] }}</p>
						@if($boat['surface_voilure'] > 0)<p><strong>Surface de voilure</strong>: {{ $boat['surface_voilure'] }}mètres carré</p>@endif
						<p><strong>Dimensions Longueur/Largeur/Hauteur en mètres </strong>: {{ $boat['dimension_x_bateau'] }}/{{ $boat['dimension_y_bateau'] }}/{{ $boat['dimension_z_bateau'] }}m</p>
						<p><strong>Volume de la coque en mètres cube </strong>: {{ $boat['volume_coque'] }}mètres cube</p>
						<p><strong>Masse du navire </strong>: {{ $boat['masse_navire'] }}kg</p>
						
						@if($moteur != null)
						<h2>Moteur</h2>
						<p><strong>Puissance du moteur</strong>: {{ $moteur['puissance_moteur'] }}</p>
						<p><strong>Kilométrage</strong>: {{ $moteur['kilometrage'] }}km</p>
						<p><strong>Horamètre</strong>: {{ $moteur['horametre_compte'] }}heures</p>
						<p><strong>Modèle</strong>: {{ $equipmoteur['nom'] }} {{ $equipmoteur['modele'] }}</p>
						<p><strong>Date de construction </strong>: {{ $equipmoteur['equipement']['created_at'] }}</p>
						<p><strong>Dernier entretien </strong>: {{ $equipmoteur['equipement']['updated_at'] }}</p>
						<p><strong>Durée de vie </strong>: {{ $equipmoteur['equipement']['duree_vie_equip'] }} ans</p>
						@if($equipmoteur['equipement']['revision_periodique_equip'] != 0)<p><strong>Prochain entretien obligatoire </strong>: {{ $equipmoteur['equipement']['updated_at'] }} + {{ $equipmoteur['equipement']['revision_periodique_equip'] }} mois </p>@endif
						@if($equipmoteur['equipement']['equip_origine'] != 0)<p><strong>D'Origine</strong></p>@endif
						@if($equipmoteur['equipement']['q_equip_rechange'] != 0)<p><strong>En rechange</strong> : {{$equipmoteur['equipement']['q_equip_rechange']}}</p>@endif
						<p><strong>Etat </strong>: {{ $equipmoteur['etat'] }}</p>
						@endif

						<!-- Pieces, equipements, moteur -->
						
						@if($equipements != null and $equipements[0] != null)
						
						<h2>Equipements</h2>
						<table class="table">
						    <thead class="thead-dark">
						      <tr>
							<th>NOM / MODELE</th>
							<th>DATE CONSTRUCTION</th>
							<th>DERNIER ENTRETIEN</th>
							<th>DUREE DE VIE</th>
							<th>INTERVALLE REVISION</th>
							<th>D'ORIGINE</th>
							<th>EN RECHANGE</th>
							<th>ETAT</th>
						      </tr>
						    </thead>
						    <tbody>
						@foreach ($equipements as $equip)
							<tr>
								<td>{{ $equip['nom'] }} {{ $equip['modele'] }}</td>
								<td>{{ $equip['equipement']['created_at'] }}</td>
								<td>{{ $equip['equipement']['updated_at'] }}</td>
								<td>{{ $equip['equipement']['duree_vie_equip'] }} ans</td>
								<td>{{ $equip['equipement']['revision_periodique_equip'] }} mois </td>
								<td>@if($equip['equipement']['equip_origine'] != 0) Oui @else Non @endif</td>
								<td>{{ $equip['equipement']['q_equip_rechange'] }}</td>
								<td>{{ $equip['etat'] }}</td>
							</tr>
						@endforeach
							</tbody>
						  </table>
						@endif

						@if($pieces != null and $pieces[0] != null)
						
						<h2>Pieces</h2>
						<table class="table">
						    <thead class="thead-dark">
						      <tr>
							<th>NOM / MODELE</th>
							<th>DATE CONSTRUCTION</th>
							<th>DERNIER ENTRETIEN</th>
							<th>DUREE DE VIE</th>
							<th>INTERVALLE REVISION</th>
							<th>D'ORIGINE</th>
							<th>EN RECHANGE</th>
							<th>ETAT</th>
						      </tr>
						    </thead>
						    <tbody>
						@foreach ($pieces as $piece)
							<tr>
								<td>{{ $piece['nom'] }} {{ $piece['modele'] }}</td>
								<td>{{ $piece['piece']['created_at'] }}</td>
								<td>{{ $piece['piece']['updated_at'] }}</td>
								<td>{{ $piece['piece']['duree_vie_piece'] }} ans</td>
								<td>{{ $piece['piece']['revision_periodique_piece'] }} mois </td>
								<td>@if($piece['piece']['piece_origine'] != 0) Oui @else Non @endif</td>
								<td>{{ $piece['piece']['q_piece_rechange'] }}</td>
								<td>{{ $piece['etat'] }}</td>
							</tr>
						@endforeach
							</tbody>
						  </table>
						@endif

						<!-- entretien -->
						@if($entretiens != null and $entretiens[0] != null)
						
						<h2>Entretiens</h2>
						<table class="table">
						    <thead class="thead-dark">
						      <tr>
							<th>DATE</th>
							<th>ID ENTRETIEN</th>
							<th>LIBELLÉ</th>
						      </tr>
						    </thead>
						    <tbody>
						@foreach ($entretiens as $ent)
							<tr>
								<td>{{ $ent['date_entretien'] }}</td>
								<td>{{ $ent['id_entretien'] }}</td>
								<td>{{ $ent['libellé'] }}</td>
							</tr>
						@endforeach
							</tbody>
						  </table>
						@endif
					</div>
				</div>
			</div>
		</section>
		

		</div>
	 </div>
 </main>
<script>
@if(isset($unvalid))
document.getElementById('autorisation').innerHTML = "Interdite";
document.getElementById("autorisation").style.color = "red";
@else
document.getElementById('autorisation').innerHTML = "Autorisée";
document.getElementById("autorisation").style.color = "green";
@endif
</script>
@endsection
