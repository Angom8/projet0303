@extends('layouts.app')
@section('title')
...
@endsection
@section('content')

  <audio autoplay loop>
	<source src="{{ url('/m/congrats.mp3') }}" type="audio/mpeg">
       comic sans
    </audio>

<!-- Si cela ne marche pas => activer l'audio du site ! -->

<script>
</script>
@endsection
