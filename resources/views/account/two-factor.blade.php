@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-4">
        @include('account.aside')
    </div>

    <div class="col-xs-12 col-md-8">
        <article>
            <h4>{{ $title }}</h4>

            @if (auth()->user()->hasEnabledTwoFactorAuthentication())
                <div class="row">
                    <div class="col-md-4">
                        {!! auth()->user()->twoFactorQrCodeSvg() !!}
                    </div>

                    <div class="col-md-8">
                        <p>@lang('Scan the QR code with your authenticator app to enable two-factor authentication.')</p>

                        <p><a href="" id="open-recovery-modal">Show recovery code</a></p>
                    </div>
                </div>

                <dialog id="modal-recovery-code">
                    <article x-data="{ title: 'two-factor=modal' }">
                        <header>
                            <a href="#close" id="close-recovery-modal" aria-label="Close" class="close"></a>
                            @lang('Recovery codes')
                        </header>
                        <p>@lang('Please store these recovery codes in safe places. You can use the recovery codes when you lose access to mobile device.')</p>

                        <br>
                        <ul>
                            @foreach (auth()->user()->recoveryCodes() as $code)
                                <li>{{ $code }}</li>
                            @endforeach
                        </ul>
                    </article>
                </dialog>

                <hr>
            @endif

            @if (!auth()->user()->hasEnabledTwoFactorAuthentication())
                <p>@lang('With 2-Step Verification, you’ll protect your account with both your password and your phone.')</p>
                <p>@lang('Read more about two factor authentication at :link.', [
                    'link' => '<a href="https://en.wikipedia.org/wiki/Multi-factor_authentication" target="_blank">Wikipedia</a>',
                ])</p>
                <form action="{{ route('two-factor.enable') }}" method="post">
                    @csrf
                    @method('post')

                    <label for="buttons">
                        <button type="submit">@lang('Enable Two-Factor Authentication')</button>
                    </label>
                </form>
            @else
                <form action="{{ route('two-factor.disable') }}" method="post">
                    @csrf
                    @method('delete')

                    <label for="buttons">
                        <button type="submit" class="secondary">@lang('Disable Two-Factor Authentication')</button>
                    </label>
                </form>
            @endif
        </article>
    </div>
</div>
@endsection

@push('script')
<script>
    u('#open-recovery-modal').on('click', e => {
        e.preventDefault();
        u('#modal-recovery-code').attr('open', true);
    })

    u('#close-recovery-modal').on('click', e => {
        e.preventDefault()
        u('#modal-recovery-code').attr('open', false);
    })
</script>
@endpush