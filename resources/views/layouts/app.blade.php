<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">

    <title>{{ $title ?? config('app.name') }}</title>
</head>

<body>
    <main class="container">
        <nav>
            <ul>
                <li><strong>{{ config('app.name') }}</strong></li>
            </ul>
            <ul>
                @auth
                    <li><a href="{{ route('account') }}">@lang('Account')</a></li>
                    <li><a href="{{ route('password') }}">@lang('Change Password')</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('Log out (:name)', ['name' => auth()->user()->name])</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                        @csrf
                        @method('post')
                    </form>
                @else
                    <li><a href="{{ route('login') }}">@lang('Log in')</a></li>
                    <li><a href="{{ route('register') }}">@lang('Register')</a></li>
                @endauth
            </ul>
        </nav>

        @yield('content')
    </main>
</body>

</html>
