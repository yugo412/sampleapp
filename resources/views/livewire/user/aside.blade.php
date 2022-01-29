<article>
    <aside>
        <nav>
            <ul>
                @can('view role')
                    <li><a href="{{ route('role') }}">@lang('Role')</a></li>
                @endcan
                @can('view permission')
                    <li><a href="{{ route('permission') }}">@lang('Permission')</a></li>
                @endcan
            </ul>
        </nav>
    </aside>
</article>
