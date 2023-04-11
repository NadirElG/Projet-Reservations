@extends('layouts.app')

@section('title', 'Liste des artistes')

@section('content')
    <div class="container">
        <h1 class="mb-4">Liste des {{ $resource }}</h1>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <ul class="list-unstyled mb-0">
                <li><a href="{{ route('artist.create') }}" class="btn btn-primary">Ajouter un artiste</a></li>
            </ul>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Déconnexion</button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($artists as $artist)
                        <tr>
                            <td>{{ $artist->lastname }}</td>
                            <td>{{ $artist->firstname }}</td>
                            <td>
                                <a href="{{ route('artist.show', $artist->id) }}" class="btn btn-sm btn-outline-primary">Voir</a>
                                <a href="{{ route('artist.edit', $artist->id) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
