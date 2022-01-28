<div class="row">
    <div class="col-md-12 col-xs-12">
        <article>
            <h4>{{ $title }}</h4>

            <figure>
                <table>
                    <thead>
                        <tr>
                            <th>@lang('Registered')</th>
                            <th>@lang('Name')</th>
                            <th>@lang('Email')</th>
                            <th>@lang('Role')</th>
                            <th>@lang('Two-Factor Auth')</th>
                            <th class="text-right">@lang('Actions')</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->updated_at->format('Y-m-d H:i') }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ implode(', ', $user->roles->map(fn($role) => $role->name)->toArray()) }}</td>
                                <td>
                                    @if ($user->hasEnabledTwoFactorAuthentication())
                                        <input type="checkbox" wire:change="disableTwoFactor({{ $user->getKey() }})" role="switch" checked>
                                    @else
                                        <input type="checkbox" role="switch" disabled>
                                    @endif
                                </td>
                                <td class="text-right">
                                    @can('edit user')
                                        <a href="#"><i class="fa fa-fw fa-edit"></i></a>
                                    @endcan
                                    @can('delete user')
                                        @if ($user->id === auth()->id())
                                            <i class="fa fa-trash fa-fw"></i>
                                        @else
                                            <a href="#" wire:click.prevent="delete({{ $user->getKey() }})"><i class="fa fa-fw fa-trash"></i></a>                                    
                                        @endif
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </figure>

            {{ $users->links() }}
        </article>
    </div>
</div>
