@extends('layouts.app')

@section('content')
<div class="grid">
    <div>
        @if (auth()->check() and !auth()->user()->hasVerifiedEmail())
        <article>
            <h6>@lang('A new verification email will be sent to your email address: <b>:email</b>.', ['email' => auth()->user()->email])</h6>

            <form method="post" action="{{ route('verification.send') }}">
                @csrf
                @method('post')
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Send Email Verification') }}</button>
            </form>
        </article>
        @endif

        <article>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, tempora, vero quae quas nobis asperiores
            possimus quod voluptate dolore nemo incidunt iste optio nostrum maiores nihil aut ex officia minima?
        </article>
    </div>
</div>
@endsection
