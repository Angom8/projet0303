

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vérifier votre adresse mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nouveau lien a bien été envoyé') }}
                        </div>
                    @endif

                    {{ __('Merci de vérifier votre adresse mail avant de continuer') }}
                    {{ __('Si vous n\'avez rien reçu') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Cliquez ici pour renvoyer un mail') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

