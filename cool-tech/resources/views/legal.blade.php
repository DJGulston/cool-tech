<?php

// Checks which slug the user entered and returns the corresponding title.
function getPageName($slug) {
    if($slug === 'terms-of-use') {
        return 'Terms Of Use';
    }
    else if($slug === 'privacy') {
        return 'Privacy Policy';
    }
}

?>

<html lang="en">

    <head>
        <title>Legal: {{ getPageName($slug) }}</title>
        <meta charset="UTF-8">
    </head>

    <body>
        <h1>Legal: {{ getPageName($slug) }}</h1>

        @if($slug === 'terms-of-use')
            <!-- Displays the terms of use if the user enters the terms-of-use slug. -->
            <p>
                This is the official Terms of Use Agreement (“Terms of Use”) for the specific Internet website, 
                application or other interactive service (“Site,” “we,” “us,” or “our”) provided by Paramount 
                Global (“Paramount”) that contains an authorized link to these Terms of Use. These Terms of Use 
                apply whether you are accessing the Site via a personal computer, a mobile device or any other 
                technology or devices now known or hereafter developed or discovered.
                <br><br>
                These Terms of Use govern only the content, features, and activities related to this Site and 
                do not cover any other websites of Paramount, any affiliates that Paramount directly or indirectly 
                owns or controls (collectively, “Affiliates”) or any other company, unless specifically stated.
            </p>

        @elseif($slug === 'privacy')
            <!-- Displays the privacy policy if the user enters the privacy slug. -->
            <p>
                This Policy describes how Paramount and its affiliates (collectively “Paramount”) collect, use and 
                disclose certain information, including your Personal Information, both online and offline, and the 
                choices you can make about that information.
                <br><br>
                We are a leading global media and entertainment company that creates content and experiences for 
                audiences worldwide. When you use our streaming services, mobile and online applications or other 
                products and services of our brands, visit our websites, attend our live events, view our content or 
                advertisements, or contact our customer service (collectively, the “Services”), we may collect 
                information from or about you.
            </p>

        @endif

    </body>

    <!-- Displays a cookie notice -->
    <x-cookie-notice />

    <br>

    <!-- Displays the footer -->
    <x-cool-tech-footer />

</html>