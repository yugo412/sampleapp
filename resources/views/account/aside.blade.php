<article>
    <aside>
        <nav>
            <ul>
                <li><a href="{{ route('account') }}">@lang('Profile')</a></li>
                <li><a href="{{ route('password') }}">@lang('Change Password')</a></li>
                <li><a href="{{ route('password') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('Log Out')</a></li>
            </ul>
        </nav>

        <form id="logout-form" action="{{ route('logout') }}" method="post"
            style="display: none;">
            @csrf
            @method('post')
        </form>
    </aside>
</article>