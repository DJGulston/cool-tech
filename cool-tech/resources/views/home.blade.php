<html lang="en">

    <head>
        <title>Home</title>
        <meta charset="UTF-8">
    </head>

    <body>
        <h1>Welcome to the Home Page!</h1>

        <h2>Latest articles:</h2>

        @foreach($articles as $article)

            <!-- Link to the specific article -->
            <h3><a href="{{ url('/article' . '/' . $article->id) }}">{{ $article->title }}</a></h3>
            
            <?php
            
            // Separates all paragraphs in the article using a new line character or a <br> tag as a delimiter.
            $paragraphs = preg_split('(<br>|\n|\r\n)', $article->content);

            // Displays the first of the article.
            if($paragraphs && sizeof($paragraphs) >= 1) {
                echo '<p>' . $paragraphs[0] . '</p>';
            }
            
            ?>

        @endforeach

    </body>

    <!-- Displays a cookie notice -->
    <x-cookie-notice />

    <br>

    <!-- Displays the footer -->
    <x-cool-tech-footer />

</html>

<!--
    References:

    How to type a copyright symbol in HTML:
    - https://careerkarma.com/blog/html-copyright-symbol/

    How to split a string using a delimiter in PHP:
    - https://www.php.net/manual/en/function.explode.php
    
    How to split a string using a regular expression as a delimiter in PHP:
    - https://stackoverflow.com/questions/3679033/multiple-explode-characters-with-comma-and-hyphen
    - https://www.php.net/preg_split

-->