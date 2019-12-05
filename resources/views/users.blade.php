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

		<nav aria-label="page navigation">
		  <ul class="pagination justify-content-end">
		    <li class="page-item">
		      <a class="btn btn-secondary" href="{{ url('/helper/users/') }}" tabindex="-2">Premier</a>
		    </li>
		    <li class="page-item @if($previous == 0) disabled @endif">
		      <a class="btn btn-outline-info" href="{{ $previous!=0 ?  url('/helper/users/'.($previous)) : '#' }}" tabindex="-1">Précédent</a>
		    </li>
		    <li class="page-item"><a class="btn btn-outline-dark" href="{{ url('/helper/users/'.($page)) }}">{{ $page }}</a></li>
		    @if(($page+1)*10<=$max) <li class="page-item"><a class="btn btn-outline-dark" href="{{ url('/helper/users/'.($page+1)) }}">{{ ($page+1) }}</a></li>@endif
		    @if(($page+2)*10<=$max)<li class="page-item"><a class="btn btn-outline-dark" href="{{ url('/helper/users/'.($page+2)) }}">{{ ($page+2) }}</a></li>@endif
		    <li class="page-item @if($next) @else disabled @endif">
		      <a class="btn btn-outline-info" href="{{ $next ? url('/helper/users/'.($next)) : '#' }}">Suivant</a>
		    </li>
		    <li class="page-item">
		      <a class="btn btn-secondary" href="{{ url('/helper/users/'.$max) }}">Dernier</a>
		    </li>
		  </ul>
</nav>
		</div>
	 </div>
 </main>
@endsection
