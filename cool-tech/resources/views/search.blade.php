<html lang="en">

    <head>
        <title>Search</title>
        <meta charset="UTF-8">
    </head>

    <body>
        <h1>Search Page</h1>

        <form action="{{ url('/redirect') }}" method="post">
            @csrf <!-- Prevents the session from expiring upon clicking the Search button,
                i.e. sending the post request to the redirect page. -->

            <label for="article">Choose an article:</label>

            <!-- Displays a list of articles the user can choose from. -->
            <select id="article" name="article_id">

                @foreach($articles as $article)
                    <option value="{{ $article->id }}">{{ $article->title }}</option>
                @endforeach

            </select>

            <button type="submit">Search</button>

        </form>

        <br><br>

        <form action="{{ url('/redirect') }}" method="post">
            @csrf <!-- Prevents the session from expiring upon clicking the Search button,
                i.e. sending the post request to the redirect page. -->

            <label for="category">Choose a category:</label>

            <!-- Displays a list of categories the user can choose from. -->
            <select id="category" name="category_id">

                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach

            </select>

            <button type="submit">Search</button>

        </form>

        <br><br>

        <form action="{{ url('/redirect') }}" method="post">
            @csrf <!-- Prevents the session from expiring upon clicking the Search button,
                i.e. sending the post request to the redirect page. -->

            <label for="tag">Choose a tag:</label>

            <!-- Displays a list of tags the user can choose from. -->
            <select id="tag" name="tag_id">

                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                @endforeach

            </select>

            <button type="submit">Search</button>

        </form>

    </body>

    <!-- Displays a cookie notice -->
    <x-cookie-notice />

    <br>

    <!-- Displays the footer -->
    <x-cool-tech-footer />

</html>

<!--

References:

How to fix a code 419 session expired error in Laravel:
- https://stackoverflow.com/questions/52583886/post-request-in-laravel-error-419-sorry-your-session-419-your-page-has-exp

-->