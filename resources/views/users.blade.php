@extends('layouts.admin')
@section('title')
Utilisateurs
@endsection
@section('content')

<main>
	<div class ="content">
		<div class="container">
		  <h1>Utilisateurs</h1>
		  <div class="text-right bato-row">
		 	 <button type="button" class="btn btn-warning">Ajouter un utilisateur</button>
		  </div>
		  <table class="table">
		    <thead class="thead-dark">
		      <tr>
			<th>NOM</th>
			<th>PRENOM</th>
			<th>DATE D'INSCRIPTION</th>
			<th>NB BATEAUX</th>
			<th>ID ADHERENT</th>
			<th class="text-center">ACTION</th>
		      </tr>
		    </thead>
		    <tbody>
			@foreach($users as $user)
		      <tr>
			<td>{{ $user->prenom_utilisateur }}</td>
			<td>{{ $user->nom_utilisateur }}</td>
			<td>{{ $user->created_at }}</td>
			<td>NaN</td>
			<td>{{ $user->id }}</td>
			<td class="text-center">
				<button type="button" class="btn btn-secondary">Voir</button>
				<button type="button" class="btn btn-danger">Supprimer</button>
			</td>
			</tr>
			@endforeach
		    </tbody>
		  </table>
		</div>
	 </div>
 </main>
@endsection
