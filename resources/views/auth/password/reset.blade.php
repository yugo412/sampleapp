@extends('layouts.app')

@section('content')
<div class="grid">
    <article>
        <form action="{{ route('password.update') }}" method="post">
            @csrf
            @method('post')

            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <label for="email">
                @lang('Email address')
                <input type="email" name="email" value="{{ old('email', $request->email) }}" @error('email') aria-invalid="true" @enderror readonly>
                @error('email')
                    <small>{{ $message }}</small>
                @enderror
            </label>
            
            <label for="password">
                @lang('Password')
                <input type="password" name="password" @error('password') aria-invalid="true" @enderror autofocus>
                @error('password')
                    <small>{{ $message }}</small>
                @enderror
            </label>
            
            <label for="password_confirmation">
                @lang('Password confirmation')
                <input type="password" name="password_confirmation">
            </label>


            <label for="buttons">
                <button type="submit">@lang('Update')</button>
            </label>
        </form>

        <a href="{{ route('password.request') }}">@lang('I forgot my password')</a>
    </article>
</div>
@endsection
