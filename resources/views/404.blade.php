@extends('layouts.app')
@section('title')
Erreur 404
@endsection
@section('content')

<main>

	{{ getLogoSection() }}

		<section id="jumbotron">
			<div class="jumbotron">
				<div class="container">
					<h1>Erreur 404 : Page non trouvée</h1>
				</div>
			</div>
		</section>

</main>

@endsection
