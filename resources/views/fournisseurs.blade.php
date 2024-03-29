@extends('layouts.admin')
@section('title')
Fournisseurs
@endsection
@section('content')

<main>
	<div class ="content">
		<div class="container">
		  <h1>Fournisseurs</h1>
		  {{ getCreateFournisseur(Auth::user()->type_utilisateur) }}
		  <table class="table">
		    <thead class="thead-dark">
		      <tr>
			<th>NOM</th>
			<th>DATE D'INSCRIPTION</th>
			<th>ID FOURNISSEUR</th>
			<th class="text-center">ACTION</th>
		      </tr>
		    </thead>
		    <tbody>
			@foreach($fournisseurs as $fourni)
		      <tr>
			<td>{{ $fourni->nom_fourni }}</td>
			<td>{{ $fourni->created_at }}</td>
			<td>{{ $fourni->id_fourni }}</td>
			<td class="text-center">
				<form method="get" action={{ route('fourni.show' , ['id' => $fourni->id_fourni]) }}>
					<button type="submit" class="btn btn-secondary">Voir</button>
				</form>

				@if(Auth::user()->type_utilisateur == 2)
					<form method="post" action={{ route('fourni.delete' , ['id' => $fourni->id_fourni]) }}>
						{!! csrf_field() !!}
					{{ method_field('DELETE') }}
					<button type="submit" class="btn btn-danger">Supprimer</button>
					</form>
				@endif
			</td>
			</tr>
			@endforeach
		    </tbody>
		  </table>
<nav aria-label="page navigation">
		  <ul class="pagination justify-content-end">
		    <li class="page-item">
		      <a class="btn btn-secondary" href="{{ url('/panel/fournisseurs/') }}" tabindex="-2">Premier</a>
		    </li>
		    <li class="page-item @if($previous == 0) disabled @endif">
		      <a class="btn btn-outline-info" href="{{ $previous!=0 ?  url('/panel/fournisseurs/'.($previous)) : '#' }}" tabindex="-1">Précédent</a>
		    </li>
		    <li class="page-item"><a class="btn btn-outline-dark" href="{{ url('/panel/fournisseurs/'.($page)) }}">{{ $page }}</a></li>
		    @if(($page+1)<=$max) <li class="page-item"><a class="btn btn-outline-dark" href="{{ url('/panel/fournisseurs/'.($page+1)) }}">{{ ($page+1) }}</a></li>@endif
		    @if(($page+2)<=$max)<li class="page-item"><a class="btn btn-outline-dark" href="{{ url('/panel/fournisseurs/'.($page+2)) }}">{{ ($page+2) }}</a></li>@endif
		    <li class="page-item @if($next) @else disabled @endif">
		      <a class="btn btn-outline-info" href="{{ $next ? url('/panel/fournisseurs/'.($next)) : '#' }}">Suivant</a>
		    </li>
		    <li class="page-item">
		      <a class="btn btn-secondary" href="{{ url('/panel/fournisseurs/'.$max) }}">Dernier</a>
		    </li>
		  </ul>
</nav>
		</div>
	 </div>
 </main>
@endsection
