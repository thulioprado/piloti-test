@section('admin-content')
@if (isset($success))
    <hr>
    <div class="notification is-success">
        @lang('panel.admin.delete.success')
    </div>
@else
    @if (isset($target))
        <hr>        
        <p class="has-text-centered">
            <span class="tag is-black">@lang('panel.admin.delete.title', ['name' => $target->name])</span>
        </p>
        <br>
        <br>
        <form action="/panel/admin/delete/{{ $target->id }}" method="post" onsubmit="return $(this).loadPageOn('#admin-content');" class="has-text-centered">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @lang('panel.admin.delete.confirmation', ['name' => $target->name])
            <br>
            <br>
            <div class="columns">
                <div class="column is-3 is-offset-3">
                    <div class="control has-text-right">
                        <button type="submit" class="button is-primary is-fullwidth">@lang('panel.admin.delete.yes')</button>
                    </div>
                </div>
                <div class="column is-3">
                    <a href="/panel/admin/users" onclick="return $(this).loadPageOn('#admin-content');" class="button is-danger is-fullwidth">@lang('panel.admin.delete.no')</a>
                </div>
            </div>
        </form>
    @else
        <div class="notification is-danger">
            @lang('panel.admin.delete.data_fail')
        </div>
    @endif
@endif
@endsection