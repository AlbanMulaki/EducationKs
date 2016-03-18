<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="no-js"  lang="sq" xml:lang="sq">

    @include('includes.head')
    <body class="layout-top-nav skin-blue">
        <div class="wrapper">
            @include('includes.header')
            <!-- Full Width Column -->
            <div style="min-height: 480px;" class="content-wrapper">
                @yield('content')
            </div>
            @include('includes.footer')
        </div>
    </body>
</html>