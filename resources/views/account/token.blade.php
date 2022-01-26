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

            <table>
                <thead>
                    <tr>
                        <th>@lang('Created')</th>
                        <th>@lang('Name')</th>
                        <th>@lang('Key')</th>
                        <th>@lang('Actions')</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach (auth()->user()->tokens as $token)
                        <tr>
                            <td>{{ $token->created_at->format('Y-m-d H:i') }} </td>
                            <td>{{ $token->name }}</td>
                            <td><span data-tooltip="{{ $token->token }}">***</span></td>
                            <td>
                                <a href="" data-tooltip="@lang('Copy API key')">Copy</a>
                                <a href="">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </article>
    </div>
</div>
@endsection