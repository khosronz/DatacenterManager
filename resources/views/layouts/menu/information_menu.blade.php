<li class="treeview">
    <a href="#" id="informationmenu">
        <i class="fa fa-info-circle"></i>
        <span>اطلاعات پایه</span>
        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="treeview">
            <a href="{!! route('os.index') !!}" id="informationmenu_os"><i class="fa fa-circle-o"></i>@lang('Os')
                <span class="pull-left-container">
                  <i class="fa fa-angle-right pull-left"></i>
                </span>
            </a>
            <ul class="treeview-menu">

                <li class="{{ Request::is('ostypes*') ? 'active' : '' }}">
                    <a href="{!! route('ostypes.index') !!}"><i class="fa fa-edit"></i><span>@lang('Ostypes')</span></a>
                </li>

                <li class="{{ Request::is('os*') ? 'active' : '' }}">
                    <a href="{!! route('os.index') !!}"><i class="fa fa-edit"></i><span>@lang('Os')</span></a>
                </li>

            </ul>

        </li>
        <li class="treeview">
            <a href="{!! route('locations.index') !!}" id="informationmenu_location"><i class="fa fa-circle-o"></i>@lang('Location')
                <span class="pull-left-container">
                  <i class="fa fa-angle-right pull-left"></i>
                </span>
            </a>
            <ul class="treeview-menu">

                <li class="{{ Request::is('provinces*') ? 'active' : '' }}">
                    <a href="{!! route('provinces.index') !!}"><i class="fa fa-edit"></i><span>@lang('Provinces')</span></a>
                </li>

                <li class="{{ Request::is('cities*') ? 'active' : '' }}">
                    <a href="{!! route('cities.index') !!}"><i class="fa fa-edit"></i><span>@lang('Cities')</span></a>
                </li>

                <li class="{{ Request::is('locations*') ? 'active' : '' }}">
                    <a href="{!! route('locations.index') !!}"><i class="fa fa-edit"></i><span>@lang('Locations')</span></a>
                </li>

                <li class="{{ Request::is('ipranges*') ? 'active' : '' }}">
                    <a href="{!! route('ipranges.index') !!}"><i class="fa fa-edit"></i><span>@lang('Ipranges')</span></a>
                </li>

            </ul>

        </li>
        <li class="treeview">
            <a href="{!! route('vms.index') !!}" id="informationmenu_vm"><i class="fa fa-circle-o"></i>@lang('Vm')
                <span class="pull-left-container">
                  <i class="fa fa-angle-right pull-left"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ Request::is('vms*') ? 'active' : '' }}">
                    <a href="{!! route('vms.index') !!}"><i class="fa fa-edit"></i><span>@lang('Vms')</span></a>
                </li>

                <li class="{{ Request::is('vmtypes*') ? 'active' : '' }}">
                    <a href="{!! route('vmtypes.index') !!}"><i class="fa fa-edit"></i><span>@lang('Vmtypes')</span></a>
                </li>

            </ul>

        </li>
        <li class="{{ Request::is('connectiontypes*') ? 'active' : '' }}">
            <a href="{!! route('connectiontypes.index') !!}"><i
                        class="fa fa-edit"></i><span>@lang('Connectiontypes')</span></a>
        </li>

        <li class="{{ Request::is('organizations*') ? 'active' : '' }}">
            <a href="{!! route('organizations.index') !!}"><i class="fa fa-edit"></i><span>@lang('Organizations')</span></a>
        </li>


        <li class="{{ Request::is('domains*') ? 'active' : '' }}">
            <a href="{!! route('domains.index') !!}"><i class="fa fa-edit"></i><span>@lang('Domains')</span></a>
        </li>

        <li class="{{ Request::is('databasetypes*') ? 'active' : '' }}">
            <a href="{!! route('databasetypes.index') !!}"><i class="fa fa-edit"></i><span>@lang('Databasetypes')</span></a>
        </li>

    </ul>


</li>
