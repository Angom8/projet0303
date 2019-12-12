@extends('layouts.admin')
@section('title')
Envoyer un bateau
@endsection
@section('content')
	
	<main>
		<div class="content">
		    <div class="row justify-content-center">
			<div class="col-md-8">
				<h1>{{ __('Générer un entretien') }}</h1>
			    <div class="card">
				

				<div class="card-body">
					<p>Les champs indiqués avec une * sont obligatoires</p>
			
				    <form method="POST" action="{{ route('entretien.create.send') }}">
				        @csrf
		    
				        <div class="form-group row">
				            <label for="id_bateau" class="col-md-4 col-form-label text-md-right">{{ __('Bateau concerné*') }}</label>

				            <div class="col-md-6">
						 <select  id="id_bateau" class="form-control @error('id_bateau') is-invalid @enderror" name="id_bateau" value="{{ old('id_bateau') }}" required autocomplete="id_bateau" size="3">
							@foreach($boats as $boat)
								<option value="{{ $boat }}">{{ $boat }}</option>
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
				            <label for="libelle" class="col-md-4 col-form-label text-md-right">Libellé*</label>

				            <div class="col-md-6">
				                <textarea id="libelle" class="form-control @error('libelle') is-invalid @enderror" name="libelle" value="{{ old('libelle') }}" required autocomplete="libelle" autofocus></textarea>

				                @error('libelle')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
				

					<div class="form-group row">
				            <label for="id_piece" class="col-md-4 col-form-label text-md-right">{{ __('Id de la pièce') }}</label>

				            <div class="col-md-6">
				                <input id="id_piece" type="number" min="1"  class="form-control @error('id_piece') is-invalid @enderror" name="id_piece"   autocomplete="id_piece" autofocus>

				                @error('id_piece')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
					<div class="form-group row">
				            <label for="id_equip" class="col-md-4 col-form-label text-md-right">Id de l'équipement</label>

				            <div class="col-md-6">
				                <input id="id_equip" type="number" min="1"  class="form-control @error('id_equip') is-invalid @enderror" name="id_equip"   autocomplete="id_equip" autofocus>

				                @error('id_equip')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>
					<div class="form-group row">
				            <label for="date_entretien" class="col-md-4 col-form-label text-md-right">Date de l'entretien*</label>

				            <div class="col-md-6">
				                <input id="date_entretien" type="date"  class="form-control @error('date_entretien') is-invalid @enderror" name="date_entretien" required  autocomplete="date_entretien" autofocus>

				                @error('date_entretien')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
				            </div>
				        </div>

					<div class="form-group row mb-0">
				            <div class="col-md-6 offset-md-4">
				                <button type="submit" class="btn btn-secondary">
				                   Demander une mise en ligne du bateau
				                </button>
						 </div>
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
