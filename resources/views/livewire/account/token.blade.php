<div>
    @if(!$tokens->isEmpty())
        <figure>
        @foreach ($tokens as $token)
        <details>
            <summary>{{ $token->name }}</summary>
            <p><code>{!! wordwrap($token->token, 60, '<br>', true) !!}</code></p>

            <div>
                <a href=""><i class="fa fa-fw fa-copy"></i></a>
                <a href=""><i class="fa fa-fw fa-edit"></i></a>
                <a href="#" wire:click.prevent="delete({{ $token->getKey() }})"><i class="fa fa-fw fa-trash"></i></a>                
            </div>
        </details>
        @endforeach
        </figure>
    @endif
</div>

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/alpine-clipboard@2.x.x/dist/alpine-clipboard.js" defer>
    </script>
@endpush
