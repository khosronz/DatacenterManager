<table class="table table-responsive table-striped table-bordered" id="databases-table"
       style="display: block;overflow-x: auto; white-space: nowrap;">
    <thead>
    <tr>
        <th>@lang('Username')</th>
        <th>@lang('Status')</th>
        <th>@lang('Port')</th>
        <th>@lang('User Id')</th>
        <th>@lang('Databasetype Id')</th>
        <th>@lang('Software Id')</th>
        <th>@lang('Desc')</th>
        <th colspan="3">@lang('Action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($databases as $database)
        <tr>
            <td>{!! $database->username !!}</td>
            <td>{!! $database->status ? 'فعال' : 'غیرفعال' !!}</td>
            <td>{!! $database->port !!}</td>
            <td>{!! $database->user->name !!}</td>
            <td>{!! $database->databasetype->title !!}</td>
            <td>{!! $database->software->server_name !!}</td>
            <td>{!! $database->desc !!}</td>
            <td>
                {!! Form::open(['route' => ['databases.destroy', $database->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('databases.show', [$database->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('databases.edit', [$database->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>