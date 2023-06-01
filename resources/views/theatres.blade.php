<!DOCTYPE html>
<html>
<head>
    <title>Liste des événements Ticketmaster</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .pagination li .page-link {
            display: none;
        }
        
        .pagination li:first-child .page-link,
        .pagination li:last-child .page-link {
            display: inline-block;
        }
        </style>
        
</head>
<body>
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
</body>
</html>
