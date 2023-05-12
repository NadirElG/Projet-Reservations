@extends('layouts.app')

@section('title', 'Fiche d\'un spectacle')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-4">
                    @if($show->poster_url)
                        <img src="{{ asset('images/'.$show->poster_url) }}" alt="{{ $show->title }}" class="card-img" style="object-fit: cover; height: 100%; width: 100%;">
                    @else
                        <div style="width:100%; height:100%; background-color: #000;"></div>
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title">{{ $show->title }}</h1>

                        @if($show->location)
                            <p><strong>Lieu de création:</strong> {{ $show->location->designation }}</p>
                        @endif

                        <p><strong>Prix:</strong> {{ $show->price }} €</p>

                        @if($show->bookable)
                            <p><em>Réservable</em></p>
                        @else
                            <p><em>Non réservable</em></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <h2 class="mt-5">Liste des représentations</h2>
        @if($show->representations->count()>=1)
            <ul>
                @foreach ($show->representations as $representation)
                    <li>{{ $representation->when }} 
                    @if($representation->location)
                    ({{ $representation->location->designation }})
                    @elseif($representation->show->location)
                    ({{ $representation->show->location->designation }})
                    @else
                    (lieu à déterminer)
                    @endif
                    </li>
                @endforeach
            </ul>
        @else
            <p>Aucune représentation</p>
        @endif

        <h2 class="mt-5">Liste des artistes</h2>
        <p><strong>Auteur:</strong>
        @foreach ($collaborateurs['auteur'] as $auteur)
            {{ $auteur->firstname }} 
            {{ $auteur->lastname }}@if($loop->iteration == $loop->count-1) et 
            @elseif(!$loop->last), @endif
        @endforeach
        </p>
        <p><strong>Metteur en scène:</strong>
        @foreach ($collaborateurs['scénographe'] as $scenographe)
            {{ $scenographe->firstname }} 
            {{ $scenographe->lastname }}@if($loop->iteration == $loop->count-1) et 
            @elseif(!$loop->last), @endif
        @endforeach
        </p>
        <p><strong>Distribution:</strong>
        @foreach ($collaborateurs['comédien'] as $comedien)
            {{ $comedien->firstname }} 
            {{ $comedien->lastname }}@if($loop->iteration == $loop->count-1) et 
            @elseif(!$loop->last), @endif
        @endforeach
        </p>

        <nav class="mt-5"><a href="{{ route('show_index') }}" class="btn btn-primary">Retour à l'index</a></nav>
    </div>
@endsection
