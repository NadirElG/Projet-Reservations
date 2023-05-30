@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Create Show</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('show.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input id="title" type="text" class="form-control" name="title" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control" name="description" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="poster_url">Poster URL</label>
                                <input id="poster_url" type="text" class="form-control" name="poster_url" required>
                            </div>

                            <div class="form-group">
                                <label for="location_id">Location</label>
                                <select id="location_id" class="form-control" name="location_id" required>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->designation }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="bookable">Bookable</label>
                                <input id="bookable" type="checkbox" name="bookable" value="1">
                            </div>
                            

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input id="price" type="number" class="form-control" name="price" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
