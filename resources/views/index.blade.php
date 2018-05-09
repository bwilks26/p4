
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
</head>
<body>

    <div class='container-fluid'>


        <div class='loginForm'>


            <div class='brandContainer'>
                <img src='/img/CG_Player_logo.png' alt='CW Player'>
            </div>

            <form method='GET' action='/dashboard'>
                <div class='row-fluid'>
                    <label>Username</label>
                    <input type='text'
                           name='username'
                           placeholder='Required*'
                </div>
                <div class='row-fluid'>
                    <label>Password</label>
                    <input type='text'
                           name='password'
                           placeholder='Required*'
                </div>

                <div class='loginButton'>
                <input type='submit' value='Login'>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
