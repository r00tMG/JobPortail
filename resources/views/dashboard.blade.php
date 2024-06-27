{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">

    <title>
        @yield('title')
    </title>


    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700"/>

    <!-- Nucleo Icons -->
    <link href="{{url('./assets/css/nucleo-icons.css')}}" rel="stylesheet"/>
    <link href="{{url('./assets/css/nucleo-svg.css')}}" rel="stylesheet"/>

    <!-- Font Awesome Icons -->
    <script src="{{assert('https://kit.fontawesome.com/42d5adcbca.js')}}" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- CSS Files -->


    <link id="pagestyle" href="{{url('./assets/css/material-dashboard.css?v=3.1.0')}}" rel="stylesheet"/>
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    @include('components.sidebar')
</aside>

<main class="main-content border-radius-lg ">
    <!-- Navbar -->
        @include('components.navbar')
    <div class="container p-3">
        @yield('content')
    </div>
    <div class="container-fluid py-4">
        @include('components.footer')
    </div>
</main>
@include('components.settings')
<!--   Core JS Files   -->
<script src="{{url('./assets/js/core/popper.min.js')}}"></script>
<script src="{{url('./assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{url('./assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{url('./assets/js/plugins/smooth-scrollbar.min.js')}}"></script>


<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>

<!-- Github buttons -->
<script async defer src="{{url('https://buttons.github.io/buttons.js')}}"></script>

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{url('./assets/js/material-dashboard.min.js?v=3.1.0')}}"></script>
</body>

</html>
