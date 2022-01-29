<div class="row">
    <div class="col-xs-12 col-md-4">
        <article>
            <aside>
                <nav>
                    <ul>
                        <li><a href="{{ route('user.view', $user->getKey()) }}">@lang('View')</a></li>
                        <li><a href="{{ route('user') }}">@lang('Back')</a></li>
                    </ul>
                </nav>
            </aside>
        </article>
    </div>

    <div class="col-xs-12 col-md-8">
        <article>
            <form wire:submit.prevent="update" action="">
                <label for="email">
                    @lang('Email')
                    <input type="email" wire:model="email" disabled>
                </label>

                <label for="name">
                    @lang('Name')
                    <input type="text" wire:model="name">
                </label>

                <div class="buttons">
                    <button wire:click="update" type="submit">@lang('Update')</button>
                </div>
            </form>
        </article>
    </div>
</div>
