@section('panel-content')
<div class="columns">
    <div class="column is-3 is-offset-3">
        <a href="/panel/admin/users" onclick="return $(this).loadPageOn('#admin-content');" class="button is-primary is-fullwidth">@lang('panel.admin.see_users')</a>
    </div>
    <div class="column is-3">
        <a href="/panel/admin/deleted" onclick="return $(this).loadPageOn('#admin-content');" class="button is-primary is-fullwidth">@lang('panel.admin.see_deleted')</a>
    </div>
</div>
<div id="admin-content">
    @yield('admin-content')
</div>
@endsection