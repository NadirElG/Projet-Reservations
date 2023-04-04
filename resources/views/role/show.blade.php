@extends('layouts.app')

@section('title', 'Fiche d\'un type')

@section('content')
    <h1>{{ ucfirst($role->role) }}</h1>
    <nav><a href="{{ route('role.index') }}">Retour à l'index</a></nav>
@endsection
