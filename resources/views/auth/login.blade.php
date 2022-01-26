@extends('layouts.app')

@section('content')
<div class="grid">
    <article>
        <form action="{{ route('login') }}" method="post">
            @csrf
            @method('post')

            <label for="email">
                @lang('Email address')
                <input type="email" name="email" value="{{ old('email') }}" @error('email') aria-invalid="true" @enderror autofocus>
                @error('email')
                    <small>{{ $message }}</small>
                @enderror
            </label>
            
            <label for="password">
                @lang('Password')
                <input type="password" name="password" @error('password') aria-invalid="true" @enderror>
            </label>

            <label for="remember">
                <input type="checkbox" name="remember" role="switch" indeterminate="true" checked>
                @lang('Remember me')
            </label>

            <label for="buttons">
                <br>
                <button type="submit">@lang('Log In')</button>
            </label>
        </form>

        <p>@lang('Forgot your password? <a href=":link">Click here</a> to reset password.', [
            'link' => route('password.request'),
        ])</p>
    </article>
</div>
@endsection
