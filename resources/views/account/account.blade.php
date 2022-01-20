@extends('layouts.app')

@section('content')
<div class="grid">
    <article>
        <form action="{{ route('account.update') }}" method="post">
            @csrf
            @method('patch')

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
@endsection