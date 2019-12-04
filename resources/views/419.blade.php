@extends('layouts.app')
@section('title')
Erreur 419
@endsection
@section('content')

<main>

	{{ getLogoSection() }}

		<section id="jumbotron">
			<div class="jumbotron">
				<div class="container">
					<h1>Erreur 419 : Votre session a expiré</h1>
				</div>
			</div>
		</section>

</main>

@endsection
