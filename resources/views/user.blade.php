@extends('layouts.admin')
@section('title')
Adhérent
@endsection
@section('content')

<main>

	<div class ="content">
		<div class="container">
		  <h1>{{ $user->nom_utilisateur }} {{ $user->prenom_utilisateur }}</h1>
			{{ getCreateUser() }}

		<section id="user">
			<div>
				<div class="card container">
					<div class="card-body">
						<p class="lead">@if($user->type_utilisateur==2) Administrateur(trice) @else @if($user->type_utilisateur==1) Secrétaire @else Adhérent(e) @endif @endif</p>
						<p><strong>Dernière mise à jour du profil</strong> : {{ $user->updated_at }}</p>
						<p><strong>Inscription</strong> : {{ $user->created_at }}</p>
						<p><strong>Id </strong>: {{ $user->id }}</p>
						<p><strong>Identifiant de connexion </strong>: {{ $user->login }}</p>
						<p><strong>Adresse mail </strong>: {{ $user->mail_utilisateur }}</p>
						<p><strong>Numéro de téléphone </strong>: {{ $user->tel_utilisateur }}</p>
						<form method="POST" action="{{ route('user.changepw') }}">
							@csrf 
                         				@foreach ($errors->all() as $error)

                            					<p class="text-danger">{{ $error }}</p>

                         				@endforeach 
                        				<div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe actuel</label>
								<div class="col-md-6">
									<input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
								</div>
                       					 </div>
							<div class="form-group row">
								 <label for="password" class="col-md-4 col-form-label text-md-right">Nouveau mot de passe</label>
								 <div class="col-md-6">
									<input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
								</div>
							</div>
							 <div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right">Confirmez le nouveau mot de passe</label>
								<div class="col-md-6">
								<input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
								</div>
							 </div>
							 <div class="form-group row mb-0">
								 <div class=" ml-auto">
									<button type="submit" class="btn btn-secondary">Mettre à jour</button>
								</div>
							</div>
						 </form>	
					</div>
				</div>
			</div>
		</section>
		

		</div>
	 </div>
 </main>
@endsection
