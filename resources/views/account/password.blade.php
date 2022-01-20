@extends('layouts.app')

@section('content')
<div class="grid">
    <article>
        <form action="{{ route('password.update') }}" method="post">
            @csrf
            @method('patch')

            <label for="current_password">
                @lang('Current password')
                <input type="password" name="current_password" @error('current_password') aria-invalid="true" @enderror>
                @error('current_password')
                    <small>{{ $message }}</small>
                @enderror
            </label>
            
            <label for="password">
                @lang('New password')
                <input type="password" name="password" @error('password') aria-invalid="true" @enderror>
                @error('password')
                    <small>{{ $message }}</small>
                @enderror
            </label>
            
            <label for="password_confirmation">
                @lang('Password confirmation')
                <input type="password" name="password_confirmation" @error('password_confirmation') aria-invalid="true" @enderror>
            </label>

            <label for="buttons">
                <button type="submit">@lang('Update')</button>
            </label>
        </form>
    </article>
</div>
@endsection