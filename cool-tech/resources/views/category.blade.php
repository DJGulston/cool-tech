<html lang="en">

    <head>
        <title>Category: {{ $category }}</title>
        <meta charset="UTF-8">
    </head>

    <body>
        <h1>Category: {{ $category }}</h1>

        <h2>Article list:</h2>

        <?php
            // Keeps track of the number of articles.
            $article_index = 1;
        ?>

        <!-- Displays all articles associated with the specific category. -->
        @foreach($articles as $article)
            <!-- Displays each article title with a corresponding article index. -->
            <!-- Clicking on the article title takes the user to the article's page. -->
            <h3><?php echo $article_index++ ?>. <a href="{{ url('/article' . '/' . $article->id) }}">{{$article->title}}</a></h3>

        @endforeach
    </body>

    <!-- Displays a cookie notice -->
    <x-cookie-notice />

    <br>

    <!-- Displays the footer -->
    <x-cool-tech-footer />

</html>