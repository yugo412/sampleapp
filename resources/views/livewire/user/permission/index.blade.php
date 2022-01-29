<div class="row">
    <div class="col-xs-12 col-md-4">
        @include('livewire.user.aside')
    </div>

    <div class="col-xs-12 col-md-8">
        <article>
            <h4>{{ $title }}</h4>

            <figure>
                <table>
                    <thead>
                        <tr>
                            <th>@lang('Created')</th>
                            <th>@lang('Name')</th>
                            <!-- <th>@lang('Guard')</th> -->
                            <th>@lang('Role')</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->created_at->format('Y-m-d H:i') }}</td>
                                <td>{{ ucfirst($permission->name) }}</td>
                                <!-- <td>{{ $permission->guard_name }}</td> -->
                                <td>{{ implode(', ', $permission->roles->map(fn($role) => $role->name)->toArray()) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </figure>
        </article>
    </div>
</div>
