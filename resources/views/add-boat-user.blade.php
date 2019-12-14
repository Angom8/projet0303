@extends('layouts.admin')
@section('title')
Propriétaires
@endsection
@section('content')
	
	<main>
		<div class="content">
		    <div class="row justify-content-center">
			<div class="col-md-8">
				<h1>{{ __('Propriétaires') }}</h1>
			    <div class="card">
				

				<div class="card-body">
					<p>Tous les champs sont obligatoires</p>

				    <form method="POST" action="{{ route('boat.admin.owner.add') }}">
					<h2>{{ __('Ajouter') }}</h2>
				        @csrf
  					<input id="id_bateau" type="hidden" class="form-control @error('id_bateau') is-invalid @enderror" name="id_bateau" value="{{ $boat }}" required autocomplete="id_bateau" autofocus>
				        <div class="form-group row">
				            <label for="id_utilisateur" class="col-md-4 col-form-label text-md-right">{{ __('Choix du propriétaire') }}</label>

				            <div class="col-md-6">
				                 <select  id="id_utilisateur" class="form-control @error('id_utilisateur') is-invalid @enderror" name="id_utilisateur" value="{{ old('id_utilisateur') }}" required autocomplete="id_utilisateur" size="3">
							@foreach($users as $user)
								<option value="{{ $user }}">{{ $user }}</option>
								
							@endforeach
						 
						 </select> 


				                @error('id_utilisateur')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>


				        <div class="form-group row mb-0">
				            <div class="col-md-6 offset-md-4">
				                <button type="submit" class="btn btn-secondary">
				                    {{ __('Ajouter le propriétaire') }}
				                </button>
				            </div>
				        </div>
				    </form>


					@if($owners)
				    <form method="POST" action="{{ route('boat.admin.owner.remove') }}">
					<h2>{{ __('Retirer') }}</h2>
				        @csrf
  					<input id="id_bateau" type="hidden" class="form-control @error('id_bateau') is-invalid @enderror" name="id_bateau" value="{{ $boat }}" required autocomplete="id_bateau" autofocus>
				        <div class="form-group row">
				            <label for="id_utilisateur" class="col-md-4 col-form-label text-md-right">{{ __('Choix du propriétaire') }}</label>

				            <div class="col-md-6">
				                 <select  id="id_utilisateur" class="form-control @error('id_utilisateur') is-invalid @enderror" name="id_utilisateur" value="{{ old('id_utilisateur') }}" required autocomplete="id_utilisateur" size="3">
							@foreach($owners as $owner)
								<option value="{{ $owner }}">{{ $owner }}</option>
								
							@endforeach
						 
						 </select> 


				                @error('id_utilisateur')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>


				        <div class="form-group row mb-0">
				            <div class="col-md-6 offset-md-4">
				                <button type="submit" class="btn btn-secondary">
				                    {{ __('Retirer le propriétaire') }}
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
