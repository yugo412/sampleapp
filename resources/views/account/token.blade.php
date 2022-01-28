@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4 col-xs-12">
        @include('account.aside')
    </div>

    <div class="col-md-8 col-xs-12">
        <article>
            <h4>{{ $title }}</h4>

            <form action="" method="post">
                @csrf
                @method('post')

                <label for="name">
                    @lang('Name')
                    <input type="text" name="name" @error('name') aria-invalid="true" @enderror>
                    @error('name')
                        <small>{{ $message }}</small>
                    @enderror
                </label>

                <label for="buttons">
                    <button type="submit">@lang('Create Token')</button>
                </label>
            </form>

            @livewire('account.token')
        </article>
    </div>
</div>
@endsection
