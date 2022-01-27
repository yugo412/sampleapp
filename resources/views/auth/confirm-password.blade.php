@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 col-xs-12">
        <article>
            <form action="{{ route('password.confirm') }}" method="post">
                @csrf
                @method('post')

                <label for="password" x-data="{ type : 'password' }">
                    @lang('Password') 
                    <span x-cloack x-show="type === 'password'">(<a href="#" @click="type = 'text'">show password</a>)</span>
                    <span x-cloack x-show="type !== 'password'">(<a href="#" @click="type = 'password'">hide password</a>)</span>
                    <input :type="type" name="password" @error('password') aria-invalid="true" placeholder="@lang('Please enter your current password')" @enderror>
                </label>

                <label for="buttons">
                    <button type="submit">@lang('Confirm')</button>
                </label>
            </form>
        </article>
    </div>
</div>
@endsection