@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-4">
        @include('account.aside')
    </div>

    <div class="col-xs-12 col-md-8">
        <article>
            <h4>{{ $title }}</h4>
            
            <form action="{{ route('password') }}" method="post">
                @csrf
                @method('patch')

                <label for="current_password">
                    @lang('Current password')
                        <input type="password" name="current_password" @error('current_password') aria-invalid="true"
                            @enderror>
                        @error('current_password')
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
                        <input type="password" name="password_confirmation" @error('password_confirmation')
                            aria-invalid="true" @enderror>
                </label>

                <label for="buttons">
                    <button type="submit">@lang('Update')</button>
                </label>
            </form>
        </article>
    </div>
</div>
@endsection
