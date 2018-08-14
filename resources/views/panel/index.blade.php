@section('content')
<div id="logo"></div>
<div id="main" class="columns">
    <div class="column is-6 is-offset-3">
        <header class="hero is-light">
            <div class="hero-head">
                <nav class="navbar">
                    <div class="navbar-start">
                        <a class="navbar-item is-tab is-active" href="/panel" onclick="return $(this).loadPageOn('#panel-content');">
                            <span class="icon is-medium">
                                <i class="fas fa-home"></i>
                            </span>
                            <span class="has-text-weight-semibold" style="padding-left: 2px">
                                @lang('panel.menu.home')
                            </span>
                        </a>
                        @if (Auth::user()->is_admin)
                            <a class="navbar-item is-tab" href="/panel/admin" onclick="return $(this).loadPageOn('#panel-content');">
                                <span class="icon is-medium">
                                    <i class="fas fa-user-tie"></i>
                                </span>
                                <span class="has-text-weight-semibold" style="padding-left: 2px">
                                    @lang('panel.menu.admin')
                                </span>
                            </a>
                        @endif
                    </div>
                    <div class="navbar-menu navbar-end">
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                <span class="icon is-medium">
                                    <i class="far fa-smile-beam"></i>
                                </span>
                                <span style="padding-left: 3px">{{ Auth::user()->name }}</span>
                            </a>
                            <div class="navbar-dropdown is-right">
                                <a class="navbar-item" href="/panel/profile" onclick="return $(this).loadPageOn('#panel-content');">
                                    <span class="icon is-small">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <span style="padding-left: 3px">@lang('panel.menu.profile')</span>
                                </a>
                                <hr class="navbar-divider">
                                <a class="navbar-item" href="/panel/logout" onclick="return $(this).loadPageOn('#content');">
                                    <span class="icon is-small">
                                        <i class="fas fa-power-off"></i>
                                    </span>
                                    <span style="padding-left: 3px">@lang('panel.menu.logout')</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <div id="panel-content" class="box">
            @include('panel.welcome')
            @yield('panel-content')        
        </div>
    </div>
</div>
@endsection