<html lang="en">

    <head>
        <title>{{ $article->title }}</title>
        <meta charset="UTF-8">
    </head>

    <body>
        <!-- All details of the article are displayed. -->
        <h1>{{ $article->title }}</h1>

        <p>{{ $article->content }}</p>

        <p><b>Date published:</b> {{ $article->created }}</p>

        <p><b>Category:</b> {{ $article->category }}</p>

        <p><b>Tags:</b></p>

        <p>
            <!-- Displays each tag associated with the article. -->
            @foreach($tags as $tag)
                <!-- Displays the tag if the tag is not blank. -->
                @if($tag->tag_name)
                    <span style="background-color:black;color:white;">&nbsp;{{ $tag->tag_name }}&nbsp;</span>&nbsp;
                @endif
            @endforeach

        </p>
        
    </body>

    <!-- Displays a cookie notice -->
    <x-cookie-notice />

    <br>

    <!-- Displays the footer -->
    <x-cool-tech-footer />

</html>

<!--

References:

How to type a space in html:
- https://blog.hubspot.com/website/html-space

-->