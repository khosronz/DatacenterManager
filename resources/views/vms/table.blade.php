<table class="table table-responsive table-striped table-bordered" id="vms-table"
       style="display: block;overflow-x: auto; white-space: nowrap;">
    <thead>
    <tr>
        <th>@lang('Username')</th>
        <th>@lang('Ip')</th>
        <th>@lang('Desc')</th>
        <th>@lang('User Id')</th>
        <th>@lang('Vmtype Id')</th>
        <th>@lang('Software Id')</th>
        <th colspan="3">@lang('Action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($vms as $vm)
        <tr>
            <td>{!! $vm->username !!}</td>
            <td>{!! $vm->ip !!}</td>
            <td>{!! $vm->desc !!}</td>
            <td>{!! $vm->user->name !!}</td>
            <td>{!! $vm->vmtype->title !!}</td>
            <td>{!! $vm->software->server_name !!}</td>
            <td>
                {!! Form::open(['route' => ['vms.destroy', $vm->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('vms.show', [$vm->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('vms.edit', [$vm->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>