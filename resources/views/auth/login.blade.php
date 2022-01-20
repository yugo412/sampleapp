@extends('layouts.app')

@section('content')
<div class="grid">
    <article>
        <form action="{{ route('login') }}" method="post">
            @csrf
            @method('post')

            <label for="email">
                @lang('Email address')
                <input type="email" name="email" value="{{ old('email') }}" @error('email') aria-invalid="true" @enderror>
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


            <button type="submit">@lang('Log In')</button>
        </form>
    </article>
</div>
@endsection
