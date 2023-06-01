@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 mt-5">
            <a href="{{ route('show_index') }}">
                Nos spectacles
            </a>
        </h1>

        <div id="carouselMultiItemExample" class="carousel slide carousel-dark text-center" data-mdb-ride="carousel">
            <div class="d-flex justify-content-center mb-4">
                <button
                    class="carousel-control-prev position-relative"
                    type="button"
                    data-mdb-target="#carouselMultiItemExample"
                    data-mdb-slide="prev"
                >
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button
                    class="carousel-control-next position-relative"
                    type="button"
                    data-mdb-target="#carouselMultiItemExample"
                    data-mdb-slide="next"
                >
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="carousel-inner py-4">
                @foreach($shows->chunk(3) as $chunk)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="container">
                            <div class="row">
                                @foreach($chunk as $show)
                                    <div class="col-md-4">
                                        <div class="card h-100">
                                            @if($show->poster_url)
                                                <img class="card-img-top" src="{{ asset('images/'.$show->poster_url) }}" alt="{{ $show->title }}">
                                            @else
                                                <div style="width:100%; height:100%; background-color: #000;"></div>
                                            @endif
                                            <div class="card-body">
                                                <h4 class="card-title"><a href="{{ route('show_show', $show->id) }}">{{ $show->title }}</a></h4>
                                                @if($show->bookable)
                                                    <h5>{{ $show->price }} €</h5>
                                                @endif
                                                <p class="card-text">
                                                    @if($show->representations->count()==1)
                                                        <span>représentation</span>
                                                    @elseif($show->representations->count()>1)
                                                        <span>{{ $show->representations->count() }} représentations</span>
                                                    @else
                                                        <em>Aucune représentation</em>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <h1 class="mb-4">
            <a href="{{ route('theatres') }}">
                Événements de théâtre Ticketmaster
            </a>
        </h1>
        <div id="carouselTheatres" class="carousel slide carousel-dark text-center" data-mdb-ride="carousel">
            <div class="d-flex justify-content-center mb-4">
                <button
                    class="carousel-control-prev position-relative"
                    type="button"
                    data-mdb-target="#carouselTheatres"
                    data-mdb-slide="prev"
                >
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button
                    class="carousel-control-next position-relative"
                    type="button"
                    data-mdb-target="#carouselTheatres"
                    data-mdb-slide="next"
                >
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="carousel-inner py-4">
                @foreach($theatres->chunk(3) as $chunk)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="container">
                            <div class="row">
                                @foreach($chunk as $theatre)
                                    <div class="col-md-4">
                                        <div class="card h-100">
                                            <img class="card-img-top" src="{{ $theatre['images'][0]['url'] }}" alt="{{ $theatre['name'] }}">
                                            <div class="card-body">
                                                <h4 class="card-title">{{ $theatre['name'] }}</h4>
                                                <p class="card-text">{{ $theatre['dates']['start']['localDate'] }}</p>
                                                <p class="card-text">{{ $theatre['_embedded']['venues'][0]['name'] }}</p>
                                                <a href="{{ $theatre['url'] }}" class="btn btn-primary">Acheter des billets</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
