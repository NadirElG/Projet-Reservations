@extends('layouts.app')

@section('title', 'Fiche d\'un type')

@section('content')
    <h1>{{ ucfirst($locality->locality) }}</h1>

    <ul>
        @foreach($locality->locations as $location)
            <li>{{ $location->designation }}</li>
        @endforeach
    </ul>
    
    <nav><a href="{{ route('locality.index') }}">Retour à l'index</a></nav>
@endsection
