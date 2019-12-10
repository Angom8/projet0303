@extends('layouts.admin')
@section('title')
Mes bateaux
@endsection
@section('content')

<main>
	<div class ="content">
		<div class="container">
		  <h1>Bateaux</h1>
		  {{ getCreateBoat(Auth::user()->type_utilisateur) }}
		  <table class="table">
		    <thead class="thead-dark">
		      <tr>
			<th>NOM</th>
			<th>DERNIERE MISE A JOUR</th>
			<th>DATE D'INSCRIPTION</th>
			<th>ID BATEAU</th>
			<th class="text-center">ACTION</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($boats as $boat)
		      <tr>
			<td>{{ $boat['nom_bateau'] }}</td>
			<td>{{ $boat['entretien'] }}</td>
			<td>{{ $boat['created_at'] }}</td>
			<td>{{  $boat['id'] }}</td>
			<td class="text-center">
				<form method="get" action={{ route('boat.show' , ['id' =>  $boat['id']]) }}>
					<button type="submit" class="btn btn-secondary">Voir</button>
				</form>

				<form method="post">
{!! csrf_field() !!}
				{{ method_field('DELETE') }}
				<button type="submit" class="btn btn-danger">Supprimer</button>
				</form>
			</td>
			</tr>
			@endforeach
		    </tbody>
		  </table>
		<nav aria-label="page navigation">
		  <ul class="pagination justify-content-end">
		    <li class="page-item">
		      <a class="btn btn-secondary" href="{{ url('/panel/boats/') }}" tabindex="-2">Premier</a>
		    </li>
		    <li class="page-item @if($previous == 0) disabled @endif">
		      <a class="btn btn-outline-info" href="{{ $previous!=0 ?  url('/panel/boats/'.($previous)) : '#' }}" tabindex="-1">Précédent</a>
		    </li>
		    <li class="page-item"><a class="btn btn-outline-dark" href="{{ url('/panel/boats/'.($page)) }}">{{ $page }}</a></li>
		    @if(($page+1)<=$max) <li class="page-item"><a class="btn btn-outline-dark" href="{{ url('/panel/boats/'.($page+1)) }}">{{ ($page+1) }}</a></li>@endif
		    @if(($page+2)<=$max)<li class="page-item"><a class="btn btn-outline-dark" href="{{ url('/panel/boats/'.($page+2)) }}">{{ ($page+2) }}</a></li>@endif
		    <li class="page-item @if($next) @else disabled @endif">
		      <a class="btn btn-outline-info" href="{{ $next ? url('/panel/boats/'.($next)) : '#' }}">Suivant</a>
		    </li>
		    <li class="page-item">
		      <a class="btn btn-secondary" href="{{ url('/panel/boats/'.$max) }}">Dernier</a>
		    </li>
		  </ul>
</nav>
		</div>
	 </div>
 </main>
@endsection
