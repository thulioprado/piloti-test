@section('panel-content')
<div class="has-text-centered" style="padding: 20px">
    <span class="icon is-large">
        <i class="far fa-grin fa-2x"></i>
    </span>
    <p>@lang('panel.welcome', ['name' => Auth::user()->name ])</p>
</div>
@endsection