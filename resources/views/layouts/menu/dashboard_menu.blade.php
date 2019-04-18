<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{!! route('home.index') !!}"><i class="fa fa-tachometer"></i><span>@lang('Dashboard')</span></a>
</li>