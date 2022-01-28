<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css" type="text/css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @livewireStyles

    <title>{{ $title ?? config('app.name') }}</title>
</head>

<body>
    <main class="container">
        <nav>
            <ul>
                <li>
                    <a href="{{ route('home') }}"><i class="fa fa-home fa-fw"></i>
                        @guest
                            <strong>{{ config('app.name')  }}</strong>
                        @endguest
                    </a></li>
            </ul>
            <ul>
                @auth
                    @can('view user')
                        <li><a href="{{ route('user') }}">@lang('User')</a></li>
                    @endcan
                    @can('view role')
                        <li><a href="{{ route('role') }}">@lang('Role')</a></li>                        
                    @endcan
                    <li><a href="{{ route('profile') }}">@lang('Account (:name)', ['name' => auth()->user()->name])</a></li>
                @else
                    <li><a href="{{ route('login') }}">@lang('Log In')</a></li>
                    <li><a href="{{ route('register') }}">@lang('Register')</a></li>
                @endauth
                    <li><a href="https://github.com/yugo412/sampleapp" target="_blank"><i class="fa fa-code fa-fw" title="@lang('Open code repository')"></i></a></li>
            </ul>
        </nav>

        @yield('content')
        {{ $slot ?? null }}
    </main>

    <script src="//unpkg.com/alpinejs" defer></script>
    @stack('script')
    @livewireScripts
</body>

</html>
