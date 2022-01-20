@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-x-12 col-md-4">
        @include('account.aside')
    </div>

    <div class="col-x-12 col-md-8">
        <article>
            <form action="{{ route('account.update') }}" method="post">
                @csrf
                @method('patch')

                <label for="email">
                    @lang('Email address')
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