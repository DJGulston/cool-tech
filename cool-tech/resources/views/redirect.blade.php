<?php

if(isset($_POST['article_id'])) {
    // If the article_id is set, i.e. the user searched for an article on the Search page,
    // the user is redirected to the article page.
    header("Location: " . url('/article' . '/' . $_POST['article_id']), true, 301);
    exit();
}
else if(isset($_POST['category_id'])) {
    // If the category_id is set, i.e. the user searched for all articles on the Search page
    // of a specific category, the user is redirected to the category page.

    $category_id = (int) $_POST['category_id'];
    
    $slug = '';

    // Sets the slug according to which category was selected by the user.
    if($category_id === 1) {
        $slug = 'tech-news';
    }
    else if($category_id === 2) {
        $slug = 'software';
    }
    else if($category_id === 3) {
        $slug = 'hardware';
    }
    else if($category_id === 4) {
        $slug = 'opinions';
    }
    else if($category_id === 5) {
        $slug = 'feedback';
    }

    // User is redirected to the category page based on the slug that was assigned.
    header("Location: " . url("/category/$slug"), true, 301);
    exit();
}
else if(isset($_POST['tag_id'])) {
    // If the tag_id is set, i.e. the user searched for all articles on the Search page
    // of a specific tag, the user is redirected to the tag page.

    $tag_id = (int) $_POST['tag_id'];
    
    $slug = '';

    // Sets the slug according to which tag was selected by the user.
    if($tag_id === 1) {
        $slug = 'ai';
    }
    else if($tag_id === 2) {
        $slug = 'google';
    }
    else if($tag_id === 3) {
        $slug = 'performance-computing';
    }
    else if($tag_id === 4) {
        $slug = 'singularity';
    }
    else if($tag_id === 5) {
        $slug = 'laravel';
    }
    else if($tag_id === 6) {
        $slug = 'expressjs';
    }
    else if($tag_id === 7) {
        $slug = 'windows-11';
    }
    else if($tag_id === 8) {
        $slug = 'linux';
    }
    else if($tag_id === 9) {
        $slug = 'ryzen-5';
    }
    else if($tag_id === 10) {
        $slug = 'backend';
    }

    // User is redirected to the tag page based on the slug that was assigned.
    header("Location: " . url("/tag/$slug"), true, 301);
    exit();
}
else {
    // If no post request parameters are set, a 419 session expired error is returned.
    abort(419);
}


/*
 * References:
 * 
 * How to redirect to a new page:
 * - https://code.tutsplus.com/tutorials/how-to-redirect-with-php--cms-34680
 * 
 */