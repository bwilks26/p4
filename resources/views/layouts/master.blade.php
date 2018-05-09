<!doctype html>
<html lang='en'>
<head>
    <title>CG</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link href='/css/productManagementSystem.css' type='text/css' rel='stylesheet'>

    @stack('head')
</head>
<body>

@include('modules.nav')

@include('modules.sidenav')

<section class='content'>
    @if(session('alert'))
    <div class='container'>
        <div class='row-fluid'>
            <div class='col-sm-12'>
                <div class='flash'>{{ session('alert') }}</div>
            </div>
        </div>
    </div>
    @elseif(session('alert-danger'))
    <div class='container'>
        <div class='row-fluid'>
            <div class='col-sm-12'>
                <div class='flash-danger'>{{ session('alert-danger') }}</div>
            </div>
        </div>
    </div>
    @endif
    @yield('content')
</section>

<footer>
    &copy; {{ date('Y') }} Bryan Wilks
</footer>



@stack('body')

</body>
</html>