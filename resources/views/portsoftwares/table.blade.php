<table class="table table-responsive table-bordered table-striped" id="portsoftwares-table"
       style="display: block;overflow-x: auto; white-space: nowrap;">
    <thead>
    <tr>
        <th>@lang('Title')</th>
        <th>@lang('Status')</th>
        <th>@lang('Port Number')</th>
        <th>@lang('User Id')</th>
        <th>@lang('Software Id')</th>
        <th>@lang('Desc')</th>
        <th colspan="3">@lang('Action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($portsoftwares as $portsoftware)
        <tr>
            <td>{!! $portsoftware->title !!}</td>
            <td>{!! $portsoftware->status !!}</td>
            <td>{!! $portsoftware->port_number !!}</td>
            <td>{!! $portsoftware->user->name !!}</td>
            <td>{!! $portsoftware->software->server_name !!}</td>
            <td>{!! $portsoftware->desc !!}</td>
            <td>
                {!! Form::open(['route' => ['portsoftwares.destroy', $portsoftware->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('portsoftwares.show', [$portsoftware->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('portsoftwares.edit', [$portsoftware->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>