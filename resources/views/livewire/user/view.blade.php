<div class="row">
    <div class="col-xs-12 col-md-4">
        <article>
            <aside>
                <nav>
                    <ul>
                        <li><a href="{{ route('user.edit', $user->getKey()) }}">@lang('Edit')</a></li>
                        <li><a href="{{ route('user') }}">@lang('Back')</a></li>
                        <hr>
                        <li>
                            @if ($user->trashed())
                                <a wire:click.prevent="restore({{ $user->getKey() }})" href="">@lang('Restore')</a>
                            @else
                                <a wire:click.prevent="delete({{ $user->getKey() }})" href="#" class="secondary">@lang('Delete')</a>
                            @endif
                        </li>
                    </ul>
                </nav>
            </aside>
        </article>
    </div>

    <div class="col-xs-12 col-md-8">
        <article>
            <h4>{{ $title }}</h4>

            <table>
                <tbody>
                    <tr>
                        <td>@lang('Email')</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>@lang('Role')</td>
                        <td>
                            {{ implode(', ', $user->roles->map(fn($role) => $role->name)->toArray()) }}
                        </td>
                    </tr>
                    <tr>
                        <td>@lang('Registered')</td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                    <tr>
                        <td>@lang('Updated')</td>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
                    <tr>
                        <td>@lang('Deleted')</td>
                        <td>
                            @if ($user->trashed())
                                {{ $user->deleted_at }}
                            @else
                                @lang('Not deleted')
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>@lang('Two-Factor Auth')</td>
                        <td>
                            @if ($user->hasEnabledTwoFactorAuthentication())
                                <input type="checkbox" wire:change="disableTwoFactor({{ $user->getKey() }})" role="switch" checked>
                            @else           
                                <input type="checkbox" role="switch" disabled>                     
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </article>
    </div>
</div>
