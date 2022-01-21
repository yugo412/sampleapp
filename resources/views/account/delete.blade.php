@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4 col-xs-12">
        @include('account.aside')
    </div>

    <div class="col-md-8 col-xs-12">
        <article>
            <h4>{{ $title }}</h4>
            <p><mark>@lang('Your account will be deleted permanently but the related data may exists in the system.')</mark>
            <p>@lang('Are you sure want to delete your account permanently?')</p>

            <form action="{{ route('delete') }}" method="post">
                @csrf
                @method('post')

                <label for="password">
                    @lang('Password')
                    <input type="password" name="password" @error('password') aria-invalid="true" @enderror>
                    @error('password')
                        <small>{{ $message }}</small>                        
                    @enderror
                </label>

                <label for="buttons">
                    <button type="submit" class="secondary">@lang('Delete Permanently')</button>
                </label>
            </form>
        </article>
    </div>
</div>
@endsection
