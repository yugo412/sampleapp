@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-4">
        @include('account.aside')
    </div>

    <div class="col-xs-12 col-md-8">
        <article>
            <h4>{{ $title }}</h4>
            
            <form method="post" id="verification-form" action="{{ route('verification.send') }}">
                @csrf
                @method('post')
            </form

            @if (auth()->check() and !auth()->user()->hasVerifiedEmail())
                <p>@lang('Your email is not verified. Some features may not accessible because of it. Click :link to resend email verification.', ['link' => '<a href="#" onclick="event.preventDefault(); document.getElementById(\'verification-form\').submit();">here</a>'])</p>
            @endif

            <form action="{{ route('profile') }}" method="post">
                @csrf
                @method('patch')

                <label for="email">
                    @lang('Email address')
                    @if (auth()->user()->hasVerifiedEmail())
                        (@lang('verified'))
                    @endif
                    <input type="email" value="{{ $user->email }}" readonly disabled>
                </label>

                <label for="name">
                    @lang('Name')
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" @error('name') aria-invalid="true" @endif>
                    @error('name')
                        <small>{{ $message }}</small>
                    @enderror
                </label>

                <label for="submit">
                    <button type="submit">@lang('Update')</button>
                </label>
            </form>
        </article>
    </div>
</div>
@endsection