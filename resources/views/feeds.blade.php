{{-- resources/views/feeds.blade.php --}}

{{ '<?xml version="1.0" encoding="UTF-8"?>'."\n" }}
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>{{ env('APP_NAME') }}</title>
        <link>{{ url('/') }}</link>
        <description>Flux RSS pour {{ env('APP_NAME') }}</description>
        <language>fr</language>
        @foreach($items as $item)
            <item>
                <title>{{ $item->title }}</title>
                <link>{{ $item->link }}</link>
                <description>{{ $item->summary }}</description>
                <pubDate>{{ $item->updated->toRfc2822String() }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>
