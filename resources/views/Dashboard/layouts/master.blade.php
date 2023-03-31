
<!doctype html>
<html lang="en">

<head>
    @include('Dashboard.layouts.head')
</head>
<body class="theme-blue">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{asset('dashboard/assets/images/loader.gif')}}" width="48" height="48" alt="Lucid"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->

<div id="wrapper">

    @include('Dashboard.layouts.nav')
    @include('Dashboard.layouts.sidebar')

    

    @yield('content')


    
</div>

<!-- Javascript -->
@include('Dashboard.layouts.footer')
</body>
</html>
