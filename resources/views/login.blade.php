@section('content')
<div class="columns is-allcentered">
    <div class="column is-4">  
        <div class="box">
            <form method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="content has-text-centered">
                    @lang('login.title')
                </div>
                <div class="field">
                    <div class="control has-icons-left has-icons-right">
                        <input name="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="email" placeholder="@lang('login.email')" value="{{ old('email') }}" autocomplete="off" />
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
                        <input name="password" class="input {{ $errors->has('password') ? 'is-danger' : '' }}" type="password" placeholder="@lang('login.password')" />
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
                    <div class="columns">
                        <div class="column is-7">
                            <div class="control" style="padding-top: 5px">                                                                           
                                <label class="checkbox">
                                    <input name="remember" type="checkbox" />
                                    @lang('login.remember')
                                </label>
                            </div>
                        </div>
                        <div class="column">
                            <div class="control has-text-right">
                                <button type="submit" class="button is-primary is-fullwidth">@lang('login.login')</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <div class="has-text-centered">
                @lang('login.register.text')
                <a href="#">
                    @lang('login.register.link')
                </a>
            </div>
        </div>
    </div>
</div>
@endsection