<article>
    <aside>
        <nav>
            <ul>
                <li><a href="{{ route('profile') }}">@lang('Profile')</a></li>
                <li><a href="{{ route('password') }}">@lang('Change Password')</a></li>
                <li><a href="{{ route('password') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('Log Out')</a></li>
                <hr>
                <li><a href="{{ route('delete') }}" class="secondary">@lang('Delete Account')</a></li>
            </ul>
        </nav>

        <form id="logout-form" action="{{ route('logout') }}" method="post"
            style="display: none;">
            @csrf
            @method('post')
        </form>
    </aside>
</article>
