<li class="treeview">
    <a href="#" id="phonebookmenu">
        <i class="fa fa-info-circle"></i>
        <span>دفترچه تلفن</span>
        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('phonebooks*') ? 'active' : '' }}">
            <a href="{!! route('phonebooks.index') !!}"><i class="fa fa-edit"></i><span>@lang('Phonebooks')</span></a>
        </li>

        <li class="{{ Request::is('phonetypes*') ? 'active' : '' }}">
            <a href="{!! route('phonetypes.index') !!}"><i class="fa fa-edit"></i><span>@lang('Phonetypes')</span></a>
        </li>


    </ul>
</li>
