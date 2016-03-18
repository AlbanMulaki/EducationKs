<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="et" xml:lang="et">

    @include('includes.head')

    <body class="ap-page-on-scroll">
        Modderator
        <a href="{{ action('AdminPanel\AuthController@getLogout') }}">Log Out</a>
        
        
    </body>
</html>