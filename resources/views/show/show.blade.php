@extends('layouts.app')

@section('title', 'Fiche d\'un spectacle')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-4">
                    @if($show->poster_url)
                        <img src="{{ asset('images/'.$show->poster_url) }}" alt="{{ $show->title }}" class="card-img img-fluid" style="object-fit: cover;">
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
                            <form method="POST" action="{{ route('addmoney.stripe') }}">
                                @csrf
                                <input type="hidden" name="show_id" value="{{ $show->id }}">
                                <script
                                    src="https://checkout.stripe.com/checkout.js"
                                    class="stripe-button"
                                    data-key="{{ env('STRIPE_KEY') }}"
                                    data-amount="{{ $show->price * 100 }}"
                                    data-name="Acheter un billet pour {{ $show->title }}"
                                    data-description="Paiement pour {{ $show->title }}"
                                    data-image="{{ asset('images/stripe-logo.png') }}"
                                    data-locale="auto"
                                    data-currency="eur"
                                >
                                </script>
                            </form>
                        @else
                            <p><em>Non réservable</em></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <h2 class="mt-5">Liste des représentations</h2>
        @if($show->representations->count() >= 1)
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
            @if (isset($collaborateurs['auteur']) && count($collaborateurs['auteur']) > 0)
                @foreach ($collaborateurs['auteur'] as $auteur)
                    {{ $auteur->firstname }} {{ $auteur->lastname }}
                    @if ($loop->iteration == $loop->count - 1)
                        et
                    @elseif (!$loop->last)
                        ,
                    @endif
                @endforeach
            @else
                Aucun auteur trouvé.
            @endif
        </p>
        <p>Autres artistes:</p>
        <ul>
            @foreach ($collaborateurs as $type => $artistes)
                @if ($type !== 'auteur' && count($artistes) > 0)
                    <li><strong>{{ ucfirst($type) }}:</strong>
                        @foreach ($artistes as $artiste)
                            {{ $artiste->firstname }} {{ $artiste->lastname }}
                            @if ($loop->iteration == $loop->count - 1)
                                et
                            @elseif (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endsection
