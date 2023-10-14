<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="MyraStudio" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Retail - @yield('title', 'Inicio')</title>

        @include('layouts.theme.styles')
        @livewireStyles
    </head>

    <body>
        <!-- Begin page -->
        <div id="layout-wrapper">
            <div class="main-content">
                @include('layouts.theme.header')

                @include('layouts.theme.sidebar')

                <div class="page-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div> <!-- container-fluid -->
                </div>
                @include('layouts.theme.footer')

            </div>

        </div>

        @include('layouts.theme.scripts')
        @livewireScripts
    </body>

</html>
