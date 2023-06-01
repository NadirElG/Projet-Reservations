@extends('layouts.app')

@section('title', 'Liste des artistes')

@section('content')
    <div class="container">
        <h1 class="mb-4">Liste des {{ $resource }}</h1>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <ul class="list-unstyled mb-0">
                <li><a href="{{ route('artist.create') }}" class="btn btn-primary">Ajouter un artiste</a></li>
            </ul>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($artists as $artist)
                        <tr>
                            <td>{{ $artist->lastname }}</td>
                            <td>{{ $artist->firstname }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('artist.show', $artist->id) }}" class="btn btn-sm btn-outline-primary mr-2">Voir</a>
                                    <a href="{{ route('artist.edit', $artist->id) }}" class="btn btn-sm btn-outline-secondary mr-2">Modifier</a>
                                    <form method="post" action="{{ route('artist.delete', $artist->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
    {{ $artists->links() }}
@endsection
