<article>
    <aside>
        <nav>
            <ul>
                <li><a href="{{ route('profile') }}">@lang('Profile')</a></li>
                <li><a href="{{ route('password') }}">@lang('Change Password')</a></li>
                <li><a href="{{ route('2fa') }}">@lang('Two-Factor Authentication')</a></li>
                <li><a href="{{ route('token') }}">@lang('API Tokens')</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('Log Out')</a></li>
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
