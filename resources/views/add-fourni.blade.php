@extends('layouts.admin')
@section('title')
Ajouter un fournisseur
@endsection
@section('content')
	
	<main>
		<div class="content">
		    <div class="row justify-content-center">
			<div class="col-md-8">
				<h1>{{ __('Ajouter un Fournisseur') }}</h1>
			    <div class="card">
				

				<div class="card-body">
					<p>Tous les champs sont obligatoires</p>

					@if(isset($ajout) and $ajout == 1)
					<p style="color:green">Le fournisseur a bien été ajouté</p>
					@endif
				    <form method="POST" action="{{ route('fourni.register') }}">
				        @csrf

				        <div class="form-group row">
				            <label for="nom_fourni" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

				            <div class="col-md-6">
				                <input id="nom_fourni" type="text" class="form-control @error('name') is-invalid @enderror" name="nom_fourni" value="{{ old('nom_fourni') }}" required autocomplete="nom_fourni" autofocus>

				                @error('nom_fourni')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

				        <div class="form-group row">
				            <label for="mail_fourni" class="col-md-4 col-form-label text-md-right">{{ __('Adresse Mail') }}</label>

				            <div class="col-md-6">
				                <input id="mail_fourni" type="email" class="form-control @error('mail_fourni') is-invalid @enderror" name="mail_fourni" value="{{ old('mail_fourni') }}" required autocomplete="mail_fourni">

				                @error('mail_fourni')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

				        <div class="form-group row">
				            <label for="tel_fourni" class="col-md-4 col-form-label text-md-right">{{ __('Numéro de téléphone') }}</label>

				            <div class="col-md-6">
				                <input id="tel_fourni" type="tel" pattern="[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}" class="form-control @error('tel_fourni') is-invalid @enderror" name="tel_fourni" value="{{ old('tel_fourni') }}" required autocomplete="tel_fourni">

				                @error('tel_fourni')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>


				        <div class="form-group row mb-0">
				            <div class="col-md-6 offset-md-4">
				                <button type="submit" class="btn btn-secondary">
				                    {{ __('Créer le fournisseur') }}
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
