<!doctype html>
<html lang='en'>
<head>
    <title>CG</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href='/css/index.css' type='text/css' rel='stylesheet'>

    @stack('head')
</head>
<body>

<div class='container-fluid'>


    <div class='loginForm'>

        <div class='brandContainer'>
            <img src='/img/CG_Player_logo.png' alt='CW Player'>
        </div>

        @yield('content')

    </div>
</div>

@stack('body')

</body>
</html>