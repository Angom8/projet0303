@extends('layouts.admin')
@section('title')
Ajouter un utilisateur
@endsection
@section('content')
	
	<main>
		<div class="content">
		    <div class="row justify-content-center">
			<div class="col-md-8">
				<h1>{{ __('Ajouter un Utilisateur') }}</h1>
			    <div class="card">
				

				<div class="card-body">
					<p>Tous les champs sont obligatoires</p>
				    <form method="POST" action="{{ route('user.register') }}">
				        @csrf

				        <div class="form-group row">
				            <label for="nom_utilisateur" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

				            <div class="col-md-6">
				                <input id="nom_utilisateur" type="text" class="form-control @error('name') is-invalid @enderror" name="nom_utilisateur" value="{{ old('nom_utilisateur') }}" required autocomplete="nom_utilisateur" autofocus>

				                @error('nom_utilisateur')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

				        <div class="form-group row">
				            <label for="prenom_utilisateur" class="col-md-4 col-form-label text-md-right">{{ __('Prenom') }}</label>

				            <div class="col-md-6">
				                <input id="prenom_utilisateur" type="text" class="form-control @error('name') is-invalid @enderror" name="prenom_utilisateur" value="{{ old('nom_utilisateur') }}" required autocomplete="prenom_utilisateur" autofocus>

				                @error('prenom_utilisateur')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

				        <div class="form-group row">
				            <label for="login" class="col-md-4 col-form-label text-md-right">{{ __('Identifiants') }}</label>

				            <div class="col-md-6">
				                <input id="login" type="text" class="form-control @error('name') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus>

				                @error('login')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

				        <div class="form-group row">
				            <label for="mail_utilisateur" class="col-md-4 col-form-label text-md-right">{{ __('Adresse Mail') }}</label>

				            <div class="col-md-6">
				                <input id="mail_utilisateur" type="email" class="form-control @error('mail_utilisateur') is-invalid @enderror" name="mail_utilisateur" value="{{ old('mail_utilisateur') }}" required autocomplete="mail_utilisateur">

				                @error('mail_utilisateur')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

				        <div class="form-group row">
				            <label for="nom_pays" class="col-md-4 col-form-label text-md-right">{{ __('Pays') }}</label>

				            <div class="col-md-6">
						 <select  id="nom_pays" class="form-control @error('nom_pays') is-invalid @enderror" name="nom_pays" value="{{ old('nom_pays') }}" required autocomplete="nom_pays" size="3">
							@foreach($listPays as $pays)
								<option value="{{ $pays }}">{{ $pays }}</option>
							@endforeach
						 
						 </select> 

				                @error('nom_pays')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>


				        <div class="form-group row">
				            <label for="nom_ville" class="col-md-4 col-form-label text-md-right">{{ __('Ville') }}</label>

				            <div class="col-md-6">
				                <input id="nom_ville" type="text" class="form-control @error('nom_ville') is-invalid @enderror" name="nom_ville" value="{{ old('nom_ville') }}" required autocomplete="nom_utilisateur" autofocus>

				                @error('nom_ville')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

				        <div class="form-group row">
				            <label for="code_postal" class="col-md-4 col-form-label text-md-right">{{ __('Code Postal') }}</label>

				            <div class="col-md-6">
				                <input id="code_postal" type="text" class="form-control @error('code_postal') is-invalid @enderror" name="code_postal" value="{{ old('code_postal') }}" required autocomplete="code_postal" autofocus>

				                @error('code_postal')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

				        <div class="form-group row">
				            <label for="numero_adresse" class="col-md-4 col-form-label text-md-right">{{ __('Numéro de batiment') }}</label>

				            <div class="col-md-6">
				                <input id="numero_adresse" type="text" class="form-control @error('numero_adresse') is-invalid @enderror" name="numero_adresse" value="{{ old('numero_adresse') }}" required autocomplete="numero_adresse" autofocus>

				                @error('numero_adresse')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

				        <div class="form-group row">
				            <label for="voierie" class="col-md-4 col-form-label text-md-right">{{ __('Voierie') }}</label>

				            <div class="col-md-6">
				                <input id="voierie" type="text" class="form-control @error('voierie') is-invalid @enderror" name="voierie" value="{{ old('voierie') }}" required autocomplete="voierie" autofocus>

				                @error('voierie')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

				        <div class="form-group row">
				            <label for="tel_utilisateur" class="col-md-4 col-form-label text-md-right">{{ __('Numéro de téléphone') }}</label>

				            <div class="col-md-6">
				                <input id="tel_utilisateur" type="tel" pattern="[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}" class="form-control @error('tel_utilisateur') is-invalid @enderror" name="tel_utilisateur" value="{{ old('mail_utilisateur') }}" required autocomplete="tel_utilisateur">

				                @error('tel_utilisateur')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

				        <div class="form-group row">
				            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

				            <div class="col-md-6">
				                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

				                @error('password')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

				        <div class="form-group row">
				            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmez le mot de passe') }}</label>

				            <div class="col-md-6">
				                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
				            </div>
				        </div>

				        <div class="form-group row mb-0">
				            <div class="col-md-6 offset-md-4">
				                <button type="submit" class="btn btn-secondary">
				                    {{ __('Créer le compte') }}
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
