<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="token" id="token" value="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>How To Install Vue 3 in Laravel 9 with Vite</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    @vite('resources/css/app.css')
</head>
<body>

<div class="container">
    <div id="app"></div>
</div>
<script src="//{{ Request::getHost() }}:{{env('LARAVEL_ECHO_PORT')}}/socket.io/socket.io.js"></script>
@vite('resources/js/app.js')
</body>
</html>
