
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($theatres as $theatre)
            <div class="col-12 col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" src="{{ $theatre['images'][0]['url'] }}" alt="{{ $theatre['name'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $theatre['name'] }}</h5>
                        <p class="card-text">{{ $theatre['dates']['start']['localDate'] }}</p>
                        <p class="card-text">{{ $theatre['_embedded']['venues'][0]['name'] }}</p>
                        <a href="{{ $theatre['url'] }}" class="btn btn-primary">Buy Tickets</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
</div>

@endsection
