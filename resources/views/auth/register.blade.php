@extends('layouts.app')

@section('content')
<div class="grid">
    <article>
        <form action="{{ route('register') }}" method="post">
            @csrf
            @method('post')

            <label for="name">
                @lang('Name')
                <input type="text" name="name" value="{{ old('name') }}" @error('name') aria-invalid="true" @enderror>
                @error('name')
                    <small>{{ $message }}</small>
                @enderror
            </label>
            
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
                @error('password')
                    <small>{{ $message }}</small>
                @enderror
            </label>
            
            <label for="password_confirmation">
                @lang('Password confirmation')
                <input type="password" name="password_confirmation" @error('password_confirmation') aria-invalid="true" @enderror>
            </label>


            <button type="submit">@lang('Register')</button>
        </form>
    </article>
</div>
@endsection
