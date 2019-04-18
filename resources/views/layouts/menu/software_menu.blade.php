<li class="treeview">
    <a href="#" id="softwaremenu">
        <i class="fa fa-info-circle"></i>
        <span>سامانه / تجهیز</span>
        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('software') ? 'active' : '' }}">
            <a href="{!! route('software.index') !!}"><i class="fa fa-edit"></i><span>@lang('Software')</span></a>
        </li>

        <li class="{{ Request::is('softwaredescs*') ? 'active' : '' }}">
            <a href="{!! route('softwaredescs.index') !!}"><i class="fa fa-edit"></i><span>@lang('Softwaredesc')</span></a>
        </li>

        <li class="{{ Request::is('webaddresses*') ? 'active' : '' }}">
            <a href="{!! route('webaddresses.index') !!}"><i class="fa fa-edit"></i><span>@lang('Webaddress')</span></a>
        </li>

        <li class="{{ Request::is('portsoftwares*') ? 'active' : '' }}">
            <a href="{!! route('portsoftwares.index') !!}"><i class="fa fa-edit"></i><span>@lang('Portsoftwares')</span></a>
        </li>

        <li class="{{ Request::is('connections*') ? 'active' : '' }}">
            <a href="{!! route('connections.index') !!}"><i class="fa fa-edit"></i><span>@lang('Connections')</span></a>
        </li>

        <li class="{{ Request::is('databases*') ? 'active' : '' }}">
            <a href="{!! route('databases.index') !!}"><i class="fa fa-edit"></i><span>@lang('Databases')</span></a>
        </li>

        <li class="{{ Request::is('softwareorganizations*') ? 'active' : '' }}">
            <a href="{!! route('softwareorganizations.index') !!}"><i class="fa fa-edit"></i><span>@lang('Softwareorganizations')</span></a>
        </li>

        <li class="{{ Request::is('softwareusers*') ? 'active' : '' }}">
            <a href="{!! route('softwareusers.index') !!}"><i class="fa fa-edit"></i><span>@lang('Softwareusers')</span></a>
        </li>

    </ul>
</li>
