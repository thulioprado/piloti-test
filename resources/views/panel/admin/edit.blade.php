@section('admin-content')
@if (isset($target))
    <hr>
    <p class="has-text-centered">
        <span class="tag is-black">@lang('panel.admin.edit.title', ['name' => $target->name])</span>
    </p>
    <br>
    <form action="/panel/admin/edit/{{ $target->id }}" method="post" onsubmit="return $(this).loadPageOn('#admin-content');">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="field is-horizontal">
            <div class="field-label is-small">
                <label class="label">@lang('panel.admin.edit.name')</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control has-icons-left has-icons-right">
                        <input name="name" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" placeholder="@lang('panel.admin.edit.name')" value="{{ $target->name }}" autocomplete="off" maxlength="50" />
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                        @if ($errors->has('name'))
                            <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                        @endif
                    </div>
                    <p class="help is-danger">{{ $errors->first('name') }}</p>
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-small">
                <label class="label">@lang('panel.admin.edit.email')</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control has-icons-left has-icons-right">
                        <input name="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="email" placeholder="@lang('panel.admin.edit.email')" value="{{ $target->email }}" autocomplete="off" maxlength="100" />
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        @if ($errors->has('email'))
                            <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                        @endif
                    </div>
                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-small">
                <label class="label">@lang('panel.admin.edit.password')</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control has-icons-left has-icons-right">
                        <input name="password" class="input {{ $errors->has('password') ? 'is-danger' : '' }}" type="password" placeholder="@lang('panel.admin.edit.password')" maxlength="50" />
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                        @if ($errors->has('password'))
                            <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                        @endif
                    </div>
                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                </div>
            </div>
        </div>
        <div class="field" style="padding-top: 10px">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="control has-text-right">
                        <button type="submit" class="button is-primary is-fullwidth">@lang('panel.admin.edit.edit')</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @isset($success)
        <br>
        @if ($success)
            <div class="notification is-success">
                @lang('panel.admin.edit.success')
            </div>
        @else
            <div class="notification is-danger">
                @lang('panel.admin.edit.failed')
            </div>
        @endif
    @endisset
@else
    <div class="notification is-danger">
        @lang('panel.admin.edit.data_fail')
    </div>
@endif
@endsection