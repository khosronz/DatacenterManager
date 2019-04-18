<li class="treeview">
    <a href="#" id="securitymenu">
        <i class="fa fa-info-circle"></i>
        <span>امنیت</span>
        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
    </a>
    <ul class="treeview-menu">

        <li class="{{ Request::is('roleusers*') ? 'active' : '' }}">
            <a href="{!! route('roleusers.index') !!}"><i class="fa fa-edit"></i><span>@lang('Roleusers')</span></a>
        </li>

        <li class="{{ Request::is('roles*') ? 'active' : '' }}">
            <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>@lang('Roles')</span></a>
        </li>

    </ul>
</li>
