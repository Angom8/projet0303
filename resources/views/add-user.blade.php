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
				    <form method="POST" action="{{ route('user.register') }}">
				        @csrf

				        <div class="form-group row">
				            <label for="nom_utilisateur" class="col-md-4 col-form-label text-md-right">{{ __('Nom*') }}</label>

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
				            <label for="prenom_utilisateur" class="col-md-4 col-form-label text-md-right">{{ __('Prenom*') }}</label>

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
				            <label for="login" class="col-md-4 col-form-label text-md-right">{{ __('Identifiants*') }}</label>

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
				            <label for="mail_utilisateur" class="col-md-4 col-form-label text-md-right">{{ __('Adresse Mail*') }}</label>

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
				            <label for="tel_utilisateur" class="col-md-4 col-form-label text-md-right">{{ __('Numéro de téléphone*') }}</label>

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
				            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe*') }}</label>

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
				            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmez le mot de passe*') }}</label>

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
