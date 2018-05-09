@extends('layouts.auth')

@section('content')

            <div class='controlLogin'>
                <button type="button" onclick="window.location.href='/login'" class="loginControls">Login</button>
                <button type="button" onclick="window.location.href='/register'" class="loginControls">Register</button>
            </div>

@endsection
