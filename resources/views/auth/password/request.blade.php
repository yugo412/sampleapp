@extends('layouts.app')

@section('content')
<div class="grid">
    <article>
        <form action="{{ route('password.email') }}" method="post">
            @csrf
            @method('post')

            <label for="email">
                @lang('Email address')
                <input type="email" name="email" value="{{ old('email') }}" @error('email') aria-invalid="true" @enderror>
                @error('email')
                    <small>{{ $message }}</small>
                @enderror
            </label>


            <label for="buttons">
                <button type="submit">@lang('Send Link')</button>
            </label>
        </form>
    </article>
</div>
@endsection
