<table class="table table-responsive table-bordered table-striped" id="connections-table"
       style="display: block;overflow-x: auto; white-space: nowrap;">
    <thead>
    <tr>
        <th>@lang('Username')</th>
        <th>@lang('Port')</th>
        <th>@lang('User Id')</th>
        <th>@lang('Connectiontype Id')</th>
        <th>@lang('Software Id')</th>
        <th>@lang('Desc')</th>
        <th colspan="3">@lang('Action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($connections as $connection)
        <tr>
            <td>{!! $connection->username !!}</td>
            <td>{!! $connection->port !!}</td>
            <td>{!! $connection->user->name !!}</td>
            <td>{!! $connection->connectiontype->title !!}</td>
            <td>{!! $connection->software->server_name !!}</td>
            <td>{!! $connection->desc !!}</td>
            <td>
                {!! Form::open(['route' => ['connections.destroy', $connection->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('connections.show', [$connection->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('connections.edit', [$connection->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>