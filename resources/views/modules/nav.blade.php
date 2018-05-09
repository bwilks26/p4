<nav class='navbar navbar-inverse'>
    <div class='container-fluid'>
        <ul class='nav navbar-nav navbar-right'>
            <li class='active'>
            <form method='POST' id='logout' action='/logout'>
                {{ csrf_field() }}
                <a class='logout' href='#' onClick='document.getElementById("logout").submit();'>Logout {{ $user->name }}</a>
            </form>
            </li>
        </ul>
    </div>
</nav>