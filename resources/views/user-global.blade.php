@extends('layouts.admin')
@section('title')
Mon panel
@endsection
@section('content')
<main>

	<?php getLogoSection(); ?>
	<?php getAdmButtons(Auth::user()->type_utilisateur); ?>

</main>
@endsection
