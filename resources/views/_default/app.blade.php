<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    >
    <title>{{ $title ? $title : config('app.name') }}</title>
    @include('partials._asset-app')
</head>

<body>
    <div class="container-scroller">
        {{-- <!-- partial:{{ asset('celestial/template') }}/partials/_navbar.html --> --}}

        @include('partials._navbar-app')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial -->
            {{-- <!-- partial:{{ asset('celestial/template') }}/partials/_sidebar.html --> --}}

            <x-sidebar-app />

            <!-- partial -->

            @yield('content')


            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('partials._script-app')
</body>

</html>
