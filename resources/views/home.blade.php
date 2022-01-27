@extends('layouts.app')

@section('content')
<div class="grid">
    <div>       
        <article>
            <h4>@lang('At a Glance')</h4>
            <p>
                @lang(':app is boilerplate application built with latest Laravel (:version) version using 3rd party package for framework itsel or for the UI This boilerplate app included with these features:', [
                    'app' => config('app.name'),
                    'version' => app()->version(),
                ])
            </p>

            <ul>
                <li>@lang('Authentication, including: login, register, forgot password, confirm password, and verify email')</li>
                <li>
                    @lang('Account management, such as:')
                    <ul>
                        <li>@lang('Change password')</li>
                        <li>@lang('Two-Factor Authentication')</li>
                        <li>@lang('API tokens manager')</li>
                        <li>@lang('Delete account permanently')</li>
                    </ul>
                </li>
                <li>@lang('Role and permission manager')</li>
                <li>@lang('User manager')</li>
            </ul>

            <hr>

            <h6>@lang('3rd Parties')</h6>

            <ul>
                <li><a href="https://alpinejs.dev">AplineJS</a></li>
                <li><a href="https://fontawesome.com">FontAwesome</a></li>
                <li><a href="http://flexboxgrid.com">Flexbox Grid</a></li>
                <li><a href="https://picocss.com">PicoCSS</a></li>
                <li><a href="https://laravelactions.com">Laravel Actions</a></li>
                <li><a href="https://spatie.be/docs/laravel-permission">Laravel Permission</a></li>
            </ul>
        </article>
    </div>
</div>
@endsection
