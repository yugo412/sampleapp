<div class="row">
    <div class="col-md-12 col-xs-12">
        <article>
            <h4>{{ $title }}</h4>

                <label for="query">
                    <input wire:model="query" type="text" placeholder="@lang('Search users...')" autofocus>
                </label>

            <figure>
                <table>
                    <thead>
                        <tr>
                            <th>@lang('Registered')</th>
                            <th>@lang('Name')</th>
                            <th>@lang('Email')</th>
                            <th class="text-right">@lang('Actions')</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                                <td><a href="{{ route('user.view', $user->getKey()) }}">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td class="text-right">
                                    @can('edit user')
                                        <a href="{{ route('user.edit', $user->getKey()) }}"><i class="fa fa-fw fa-edit"></i></a>
                                    @endcan
                                    @can('delete user')
                                        @if ($user->getKey() === auth()->id())
                                            <i class="fa fa-trash fa-fw"></i>
                                        @else
                                            @if ($user->trashed())
                                                <a href="#" title="@lang('Restore user')" wire:click.prevent="restore({{ $user->getKey() }})"><i class="fa fa-fw fa-trash-restore"></i></a>
                                            @else
                                                <a href="#" title="@lang('Delete temporary')" wire:click.prevent="$set('deleteUser', {{ $user }})"><i class="fa fa-fw fa-trash"></i></a>                                    
                                            @endif
                                        @endif
                                    @endcan
                                </td>
                            </tr>
                        @endforeach

                        
                    </tbody>

                    @if($users->isEmpty())
                        <tfoot>
                            <tr>
                                <td colspan="4">@lang('No users found.')</td>
                            </tr>
                        </tfoot>
                    @endif
                </table>

                @if (!empty($deleteUser))
                    <dialog open>
                        <article>
                            <header>
                                <a href="#close" wire:click.prevent="$set('deleteUser', null)" aria-label="Close" class="close"></a>
                                @lang('Delete Confirmation')
                            </header>
                            <p>@lang('Are you sure want to temporary delete user <strong>:name</strong>?', ['name' => $deleteUser['name']])</p>
                            <p>@lang('This action will make user temporary deleted and you can undelete the user later. Only the user itself can delete account permanently.')</p>

                            <footer>
                                <button wire:click="delete({{ $deleteUser['id'] }})">@lang('Delete')</button>
                            </footer>
                        </article>
                    </dialog>
                @endif

            </figure>

            {{ $users->links() }}
        </article>
    </div>
</div>
