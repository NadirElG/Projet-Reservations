<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
    <channel>
        <title>Your Channel Title</title>
        <link>{{ url('/') }}</link>
        <description>Your Channel Description</description>

        @foreach ($items as $item)
            <item>
                <title>{{ $item['title'] }}</title>
                <link>{{ $item['link'] }}</link>
                <description>{{ $item['description'] }}</description>
                <pubDate>{{ $item['pubDate'] }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>
