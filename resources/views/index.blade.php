<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="This portal helps you to track your Hacktoberfest status">
        <meta property="og:title" content="Hacktoberfest Portal" />
        <meta property="og:description" content="This portal helps you to track your Hacktoberfest status" />
        <meta property="og:image" content="https://nyc3.digitaloceanspaces.com/hacktoberfest/Hacktoberfest17-TWFB-02.png" />

        <title>Hacktoberfest Portal</title>

        <style>
            {{ file_get_contents(public_path('css/preload.css')) }}
        </style>
    </head>
    <body>
        <header class="banner banner--with-background banner--home">
            <div class="container container--header">
                <div class="container__content centered">
                    <img src="{{ asset('images/logo.svg') }}" alt="Hacktoberfest Logo">

                    <p class="mb-30 mt-30 description">This portal helps you to track your <a href="https://hacktoberfest.digitalocean.com/">Hacktoberfest</a> status.<br>Simply click "Authenticate using GitHub" and we'll do the rest for you.</p>
                    
                    <p class="lead">
                            
                            <a class="pure-button pure-button-primary" href="{{ url('/auth') }}">Authenticate using GitHub</a>
                     </p>
                    
                </div>
            </div>
        </header>

        
        
    </body>
</html>
