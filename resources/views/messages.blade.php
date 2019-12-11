@extends('layouts.admin')
@section('title')
Messages
@endsection
@section('content')
<main>
	<div class ="content">
		<div class="container">
		  <h1 class="bato-row">Mes messages</h1>
		  <table class="table">
		    <thead class="thead-dark">
		      <tr>
			<th>DATE</th>
			<th>ID BATEAU</th>
			<th>ID ADHERENT</th>
			<th>LIBELLÉ</th>
			<th class="text-center">ACTION</th>
		      </tr>
		    </thead>
		    <tbody>
			@foreach($messages as $msg)
		      <tr>
			<td>{{ $msg->date_msg }}</td>
			<td>{{ $msg->id_bateau }}</td>
			<td>{{ $msg->id_utilisateur }}</td>
			<td>{{ $msg->libellé }}</td>
			<td class="text-center">
					<form method="post" action={{ route('admin.traiter.message' , ['id' => $msg->id_msg]) }}>
						{!! csrf_field() !!}
					{{ method_field('DELETE') }}
					<button type="submit" class="btn btn-danger">A été traité</button>
					</form>
			</td>
			</tr>
			@endforeach
		    </tbody>
		  </table>

		<nav aria-label="page navigation">
		  <ul class="pagination justify-content-end">
		    <li class="page-item">
		      <a class="btn btn-secondary" href="{{ url('/admin/messages/') }}" tabindex="-2">Premier</a>
		    </li>
		    <li class="page-item @if($previous == 0) disabled @endif">
		      <a class="btn btn-outline-info" href="{{ $previous!=0 ?  url('/admin/messages/'.($previous)) : '#' }}" tabindex="-1">Précédent</a>
		    </li>
		    <li class="page-item"><a class="btn btn-outline-dark" href="{{ url('/admin/messages/'.($page)) }}">{{ $page }}</a></li>
		    @if(($page+1)<=$max) <li class="page-item"><a class="btn btn-outline-dark" href="{{ url('/admin/messages/'.($page+1)) }}">{{ ($page+1) }}</a></li>@endif
		    @if(($page+2)<=$max)<li class="page-item"><a class="btn btn-outline-dark" href="{{ url('/admin/messages/'.($page+2)) }}">{{ ($page+2) }}</a></li>@endif
		    <li class="page-item @if($next) @else disabled @endif">
		      <a class="btn btn-outline-info" href="{{ $next ? url('/admin/messages/'.($next)) : '#' }}">Suivant</a>
		    </li>
		    <li class="page-item">
		      <a class="btn btn-secondary" href="{{ url('/admin/messages/'.$max) }}">Dernier</a>
		    </li>
		  </ul>
</nav>
		</div>
	 </div>
 </main>
@endsection
