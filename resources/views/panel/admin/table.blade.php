@section('admin-content')
<hr>
<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
    <thead>
        <tr>
            <th class="has-text-centered" style="width:25%;">@lang('panel.admin.name')</th>
            <th class="has-text-centered" style="width:35%;">@lang('panel.admin.email')</th>
            <th class="has-text-centered" style="width:10%;">@lang('panel.admin.is_admin')</th>
            <th class="has-text-centered" style="width:30%;">@lang('panel.admin.actions')</th>
        </tr>
    </thead>
    <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td class="has-text-centered">{{ $user->email }}</td>
                <td class="has-text-centered">
                    @if ($user->is_admin)
                        <span class="icon has-text-success">
                            <i class="fas fa-check-square"></i>
                        </span>
                    @else
                        <span class="icon has-text-danger">
                            <i class="fas fa-ban"></i>
                        </span>
                    @endif
                </td>
                <td class="has-text-centered">
                    @if (isset($restore))
                        <a href="/panel/admin/restore/{{ $user->id }}" onclick="return $(this).loadPageOn('#admin-content');" class="button is-primary is-small">@lang('panel.admin.restore')</a>
                    @else
                        <a href="/panel/admin/edit/{{ $user->id }}" onclick="return $(this).loadPageOn('#admin-content');" class="button is-primary is-small">@lang('panel.admin.change')</a>
                        <a href="/panel/admin/delete/{{ $user->id }}" onclick="return $(this).loadPageOn('#admin-content');" class="button is-danger is-small">@lang('panel.admin.erase')</a>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="has-text-centered">@lang('panel.admin.empty')</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection