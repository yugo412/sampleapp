<div>
    @if (!$tokens->isEmpty())
    <table>
        <thead>
            <tr>
                <th>@lang('Created')</th>
                <th>@lang('Name')</th>
                <th>@lang('Key')</th>
                <th class="text-right">@lang('Actions')</th>
            </tr>
        </thead>

        <tbody>
            @foreach($tokens as $token)
                <tr x-data>
                    <td>{{ $token->created_at->format('Y-m-d H:i') }} </td>
                    <td>{{ $token->name }}</td>
                    <td>{{ Str::limit($token->token, 3, '***') }}</td>
                    <td class="text-right">
                        <a href="#" @click.prevent="$clipboard('{{ $token->token }}')" data-tooltip="@lang('Copy token')"><i class="fa fa-copy fa fw"></i></a>
                        <a href="#" wire:click.prevent="deleteToken({{ $token->id }})" data-tooltip="@lang('Delete')"><i class="fa fa-trash fa-fw"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/alpine-clipboard@2.x.x/dist/alpine-clipboard.js" defer></script>
@endpush