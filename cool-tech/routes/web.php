<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

// Home page that returns a list of the latest 5 articles published to the website
// each with their first paragraph only.
Route::get('/', function () {

    $articles = DB::table('articles')
                ->select('id', 'title', 'content')
                ->orderBy('created', 'desc') // Orders the articles from latest to earliest.
                ->limit(5) // Takes the top 5 articles.
                ->get();

    return view('home', ['articles' => $articles]);
});

// Article page that returns all details of an article based on the article id
// entered by the user.
Route::get('/article/{id}', function ($id) {

    // Article obtained based on the matching article id.
    $article = DB::table('articles')
                ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
                ->select('articles.title as title', 'articles.content as content', 'articles.created as created',
                        'categories.category_name as category')
                ->where('articles.id', '=', $id)
                ->first();

    // All tags associated with the article are obtained.
    $tags = DB::table('articles')
                ->leftJoin('tagged_articles', 'articles.id', '=', 'tagged_articles.article_id')
                ->leftJoin('tags', 'tags.id', '=', 'tagged_articles.tag_id')
                ->select('tags.tag_name as tag_name')
                ->where('articles.id', '=', $id)
                ->get();

    if($article) {
        return view('article', ['article' => $article, 'tags' => $tags]);
    }
    else {
        // If no article with the given id is found in the database, a 404 not
        // found error is returned.
        abort(404);
    }
    
});

// Category page that displays a list of articles that contain that specific tag
// based on the category slug entered by the user.
Route::get('/category/{slug}', function($slug) {

    $category = '';

    // Sets the category name based on the slug entered by the user.
    if($slug === 'tech-news') {
        $category = 'Tech News';
    }
    else if($slug === 'software') {
        $category = 'Software Reviews';
    }
    else if($slug === 'hardware') {
        $category = 'Hardware Reviews';
    }
    else if($slug === 'opinions') {
        $category = 'Opinion Pieces';
    }
    else if($slug === 'feedback') {
        $category = 'Community Feedback';
    }
    else {
        // Returns a 404 not found error if the user does not enter a correct slug.
        abort(404);
    }

    // All articles obtained based on the category name that was assigned.
    $articles = DB::table('articles')
                ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
                ->select('articles.id as id', 'articles.title as title')
                ->where('categories.category_name', '=', $category)
                ->get();

    return view('category', ['articles' => $articles, 'category' => $category]);

    // Where clause determines whether the user entered a correct slug.
})->where('slug', '(tech-news|software|hardware|opinions|feedback)');

// Tag page that displays a list of articles that contain that specific tag
// based on the tag slug entered by the user.
Route::get('/tag/{slug}', function($slug) {

    $tag = '';

    // Sets the tag name based on the slug entered by the user.
    if($slug === 'ai') {
        $tag = 'AI';
    }
    else if($slug === 'google') {
        $tag = 'Google';
    }
    else if($slug === 'performance-computing') {
        $tag = 'High-Performance Computing';
    }
    else if($slug === 'singularity') {
        $tag = 'Singularity';
    }
    else if($slug === 'laravel') {
        $tag = 'Laravel';
    }
    else if($slug === 'expressjs') {
        $tag = 'ExpressJS';
    }
    else if($slug === 'windows-11') {
        $tag = 'Windows 11';
    }
    else if($slug === 'linux') {
        $tag = 'Linux';
    }
    else if($slug === 'ryzen-5') {
        $tag = 'AMD Ryzen 5';
    }
    else if($slug === 'backend') {
        $tag = 'Back-End Frameworks';
    }
    else {
        // Returns a 404 not found error if the user does not enter a correct slug.
        abort(404);
    }

    // All articles obtained based on the tag name that was assigned.
    $articles = DB::table('articles')
                ->leftJoin('tagged_articles', 'articles.id', '=', 'tagged_articles.article_id')
                ->leftJoin('tags', 'tags.id', '=', 'tagged_articles.tag_id')
                ->select('articles.id as id', 'articles.title as title')
                ->where('tags.tag_name', '=', $tag)
                ->get();

    return view('tag', ['articles' => $articles, 'tag' => $tag]);

    // Where clause determines whether the user entered a correct slug.
})->where('slug', '(ai|google|performance-computing|singularity|laravel|expressjs|windows-11|linux|ryzen-5|backend)');

// Legal page that shows either the privacy policy, or terms of use policy based on the
// slug entered by the user.
Route::get('/legal/{slug}', function($slug) {
    
    return view('legal', ['slug' => $slug]);

})->where('slug', '(terms-of-use|privacy)');

// Search page that allows a user to search for an article, list of articles for a specific
// tag, or a list of articles for a specific category.
Route::get('/search', function() {

    // All articles retrieved from database.
    $articles = DB::table('articles')
                ->select('id', 'title')
                ->get();

    // All categories retrieved from database.
    $categories = DB::table('categories')->get();

    // All tags retrieved from database.
    $tags = DB::table('tags')->get();

    return view('search', ['articles' => $articles, 'categories' => $categories, 'tags' => $tags]);
});

// Redirect page is returned whenever the user searches for something on the Search page.
// The Redirect page will redirect a user to either an article, tag or category page based
// on what the user searched for.
Route::post('/redirect', function() {
    return view('redirect');
});

// A 404 not found error is returned if the user tries to access the redirect page.
Route::get('/redirect', function() {
    abort(404);
});

/*
 * References:
 * 
 * How to perform a left join using Laravel:
 * - https://www.tutsmake.com/laravel-left-join-example/
 * 
 * How to get top 5 MySQL records and order records in descending order using Laravel:
 * - https://stackoverflow.com/questions/43828069/select-top-10-data-for-each-day-with-laravel-query-builder
 * - https://www.nicesnippets.com/blog/laravel-eloquent-limit-query-example
 * 
 * How to give a MySQL column name an alias using Laravel:
 * - https://blackdeerdev.com/laravel-eloquent-select-column-as-alias/
 * 
 * How to pass multiple parameters when returning a view:
 * - https://stackoverflow.com/questions/31681715/passing-multiple-parameters-to-controller-in-laravel-5
 */