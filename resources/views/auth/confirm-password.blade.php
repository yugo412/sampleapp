@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <article>
            <form action="{{ route('password.confirm') }}" method="post">
                @csrf
                @method('post')

                <label for="password">
                    @lang('Password')
                    <input type="password" name="password" placeholder="@lang('Please enter your current password')" @error('password') aria-invalid="true" @endif>
                    @error('password')
                        <small>{{ $message }}</small>
                    @enderror
                </label>

                <label for="buttons">
                    <button type="submit">@lang('Confirm')</button>
                </label>
            </form>
        </article>
    </div>
</div>
@endsection