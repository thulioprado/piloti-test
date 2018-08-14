@section('panel-content')
<p class="has-text-centered">
    <span class="tag is-black">@lang('panel.profile.title')</span>
</p>
<br>
<form action="/panel/profile" method="post" onsubmit="return $(this).loadPageOn('#panel-content');">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="field is-horizontal">
        <div class="field-label is-small">
            <label class="label">@lang('panel.profile.name')</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control has-icons-left has-icons-right">
                    <input name="name" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" placeholder="@lang('panel.profile.name')" value="{{ old('name', Auth::user()->name) }}" autocomplete="off" maxlength="50" />
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
            <label class="label">@lang('panel.profile.email')</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control has-icons-left has-icons-right">
                    <input name="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="email" placeholder="@lang('panel.profile.email')" value="{{ old('email', Auth::user()->email) }}" autocomplete="off" maxlength="100" />
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
            <label class="label">@lang('panel.profile.npassword')</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control has-icons-left has-icons-right">
                    <input name="npassword" class="input {{ $errors->has('npassword') ? 'is-danger' : '' }}" type="password" placeholder="@lang('panel.profile.npassword')" maxlength="50" />
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                    @if ($errors->has('npassword'))
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    @endif
                </div>
                <p class="help is-danger">{{ $errors->first('npassword') }}</p>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-small">
            <label class="label">@lang('panel.profile.cpassword')</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control has-icons-left has-icons-right">
                    <input name="cpassword" class="input {{ $errors->has('cpassword') ? 'is-danger' : '' }}" type="password" placeholder="@lang('panel.profile.cpassword')" maxlength="50" />
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                    @if ($errors->has('cpassword'))
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    @endif
                </div>
                <p class="help is-danger">{{ $errors->first('cpassword') }}</p>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-small">
            <label class="label">@lang('panel.profile.password')</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control has-icons-left has-icons-right">
                    <input name="password" class="input {{ $errors->has('password') ? 'is-danger' : '' }}" type="password" placeholder="@lang('panel.profile.password')" maxlength="50" />
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
                    <button type="submit" class="button is-primary is-fullwidth">@lang('panel.profile.change')</button>
                </div>
            </div>
        </div>
    </div>
</form>
@isset($success)
    <br>
    @if ($success)
        <div class="notification is-success">
            @lang('panel.profile.success')
        </div>
    @else
        <div class="notification is-danger">
            @lang('panel.profile.failed')
        </div>
    @endif
@endisset
@endsection