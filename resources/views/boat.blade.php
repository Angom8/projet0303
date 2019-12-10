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

		<section id="user">
			<div>
				<div class="card container">
					<div class="card-body">
						<img class="img-boat ml-auto" src="{{ $boat['url_photo'] }}">
						<p class="lead">Bateau</p>
						<p><strong>Dernière entretien</strong> : {{ $boat['updated_at'] }}</p>
						<p><strong>Inscription</strong> : {{ $boat['created_at'] }}</p>
						<p><strong>Id </strong>: {{ $boat['id_bateau'] }}</p>
						<p><strong>Distance d'éloignement </strong>: {{ $boat['distance_eloignement'] }}km</p>
					</div>
				</div>
			</div>
		</section>
		

		</div>
	 </div>
 </main>
@endsection
