<div class="row">
    <div class="col-xs-12 col-md-4">
        @include('livewire.user.aside')
    </div>

    <div class="col-xs-12 col-md-8">
        <article>
            <h4>{{ $title }}</h4>

            @if ($key && $name)
            <form action="" wire:submit.prevent="update">
                <input type="hidden" name="key" wire:model="key">
                <label for="name">
                    @lang('Name')
                    <input wire:model="name" type="text" name="name" autofocus autocomplete="false" @error('name') aria-invalid="true" @enderror>
                    @error('name')
                        <small>{{ $message }}</small>                        
                    @enderror
                </label>

                <div>
                    <button type="submit">@lang('Update')</button>
                </div>
            </form>
            @endif

            <table>
                <thead>
                    <tr>
                        <th>@lang('Created')</th>
                        <th>@lang('Name')</th>
                        <!-- <th>@lang('Guard')</th> -->
                        <th class="text-right">@lang('Users')</th>
                        <th class="text-right">@lang('Actions')</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->created_at->format('Y-m-d H:i') }}</td>
                            <td>{{ $role->name }}</td>
                            <!-- <td>{{ $role->guard_name }}</td> -->
                            <td class="text-right">{{ number_format($role->users_count) }}</td>
                            <td class="text-right">
                                @can('edit role')
                                    <a href="#" wire:click.prevent="edit({{ $role }})"><i class="fa fa-fw fa-edit"></i></a>
                                @endcan
                                @can('delete role')
                                    @if ($role->users_count == 0)
                                        <a href="#" wire:click.prevent="delete({{ $role->id }})"><i class="fa fa-fw fa-trash"></i></a>
                                    @else
                                        <i class="fa fa-trash fa-fw"></i>                                        
                                    @endif
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </article>
    </div>
</div>