@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Feeds</h5>
                            <a href="{{ route('feeds') }}" class="btn btn-primary">Go to Feeds</a>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Theatres</h5>
                            <a href="{{ route('theatres') }}" class="btn btn-primary">Go to Theatres</a>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Shows</h5>
                            <a href="{{ route('show_index') }}" class="btn btn-primary">Go to Shows</a>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Artists</h5>
                            <a href="{{ route('artist.index') }}" class="btn btn-primary">Go to Artists</a>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Create Artist</h5>
                            <a href="{{ route('artist.create') }}" class="btn btn-primary">Create Artist</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Types</h5>
                            <a href="{{ route('type.index') }}" class="btn btn-primary">Go to Types</a>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Roles</h5>
                            <a href="{{ route('role.index') }}" class="btn btn-primary">Go to Roles</a>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Localities</h5>
                            <a href="{{ route('locality.index') }}" class="btn btn-primary">Go to Localities</a>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Locations</h5>
                            <a href="{{ route('location.index') }}" class="btn btn-primary">Go to Locations</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
