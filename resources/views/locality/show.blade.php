@extends('layouts.app')

@section('title', 'Fiche d\'un type')

@section('content')
    <h1>{{ ucfirst($locality->locality) }}</h1>
    <nav><a href="{{ route('locality.index') }}">Retour à l'index</a></nav>
@endsection
