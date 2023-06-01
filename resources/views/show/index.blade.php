@extends('layouts.app')

@section('title', 'Liste des spectacles')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Liste des {{ $resource }}</h1>

        <div class="row">
            @foreach($shows as $show)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="image-container" style="height: 200px; overflow: hidden;">
                            @if($show->poster_url)
                                <img class="card-img-top" src="{{ asset('images/'.$show->poster_url) }}" alt="{{ $show->title }}" style="object-fit: cover; width: 100%; height: 100%;">
                            @else
                                <div style="width:100%; height:100%; background-color: #000;"></div>
                            @endif
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="{{ route('show_show', $show->id) }}">{{ $show->title }}</a>
                            </h4>
                            @if($show->bookable)
                            <h5>{{ $show->price }} €</h5>
                            @endif
                            <p class="card-text">
                                @if($show->representations->count()==1)
                                - <span>1 représentation</span>
                                @elseif($show->representations->count()>1)
                                - <span>{{ $show->representations->count() }} représentations</span>
                                @else
                                - <em>aucune représentation</em>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Affichage de la pagination -->
            <div class="d-flex justify-content-center">
                {{ $shows->links() }}
            </div>
        </div>
    </div>
@endsection
