@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 mt-5">
            <a href="{{ route('show_index') }}">
                Nos spectacles
            </a>
        </h1>

        <!-- Supprimez le code du carousel des spectacles -->

        <h1 class="mb-4">
            <a href="{{ route('theatres') }}">
                Événements de théâtre Ticketmaster
            </a>
        </h1>
    </div>
@endsection
