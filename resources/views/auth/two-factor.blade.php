@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <article>
            <form action="{{ route('two-factor.login') }}" method="post">
                @csrf
                @method('post')

                <label for="code">
                    @lang('Code')
                    <input type="text" name="code" @error('code') aria-invalid="true" @enderror placeholder="@lang('Please provide a valid TOTP token or recovery code')" autocomplete="off" autofocus>
                    @error('code')
                        <small>{{ $message }}</small>
                    @enderror
                </label>

                <label for="buttons">
                    <button type="submit">@lang('Submit')</button>
                </label>
            </form>
        </article>
    </div>
</div>
@endsection