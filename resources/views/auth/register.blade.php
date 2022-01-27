@extends('layouts.app')

@section('content')
<div class="grid">
    <article>
        <form action="{{ route('register') }}" method="post">
            @csrf
            @method('post')

            <label for="name">
                @lang('Name')
                <input type="text" name="name" value="{{ old('name') }}" @error('name') aria-invalid="true" @enderror autofocus>
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
            
            <label for="password" x-data="{ type : 'password' }">
                @lang('Password') 
                <span x-cloack x-show="type === 'password'">(<a href="#" @click.prevent="type = 'text'">show password</a>)</span>
                <span x-cloack x-show="type !== 'password'">(<a href="#" @click.prevent="type = 'password'">hide password</a>)</span>
                <input :type="type" name="password" @error('password') aria-invalid="true" @enderror>
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
