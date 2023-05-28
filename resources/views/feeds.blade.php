@extends('layouts.app')

@section('title', 'Flux RSS')

@section('content')
    <div class="container">
        <h1>Flux RSS</h1>

        @if ($items->count() > 0)
            <ul>
                @foreach ($items as $item)
                    <li>
                        <h3>{{ $item->title }}</h3>
                        <p>{{ $item->description }}</p>
                        <p>Date de publication : {{ $item->pubDate->toDateString() }}</p>
                        <a href="{{ $item->link }}">Lien vers l'article</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>Aucun article trouvé dans le flux RSS.</p>
        @endif
    </div>
@endsection
