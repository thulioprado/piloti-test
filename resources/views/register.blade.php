@section('content')
<div class="columns is-allcentered">
    <div class="column is-4">  
        <div class="box">
            <form method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="content has-text-centered">
                    @lang('register.title')
                </div>
                <div class="field">
                    <div class="control has-icons-left has-icons-right">
                        <input name="name" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" placeholder="@lang('register.name')" value="{{ old('name') }}" autocomplete="off" />
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                        @if ($errors->has('name'))
                            <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="field">
                    <div class="control has-icons-left has-icons-right">
                        <input name="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="email" placeholder="@lang('register.email')" value="{{ old('email') }}" autocomplete="off" />
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        @if ($errors->has('email'))
                            <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="field">
                    <div class="control has-icons-left has-icons-right">
                        <input name="password" class="input {{ $errors->has('password') ? 'is-danger' : '' }}" type="password" placeholder="@lang('register.password')" />
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                        @if ($errors->has('password'))
                            <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="field">
                    <div class="control has-icons-left has-icons-right">
                        <input name="cpassword" class="input {{ $errors->has('cpassword') ? 'is-danger' : '' }}" type="password" placeholder="@lang('register.cpassword')" />
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                        @if ($errors->has('cpassword'))
                            <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="field">
                    <div class="columns">
                        <div class="column is-4 is-offset-4">
                            <div class="control has-text-right">
                                <button type="submit" class="button is-primary is-fullwidth">@lang('register.register')</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <div class="has-text-centered">
                @lang('register.login.text')
                <a href="#">
                    @lang('register.login.link')
                </a>
            </div>
        </div>
    </div>
</div>
@endsection