<table class="table table-responsive table-striped table-bordered" id="software-table"
       style="display: block;overflow-x: auto; white-space: nowrap;">
    <thead>
    <tr>
        <th>@lang('Server Name')</th>
        <th>@lang('Status')</th>
        <th>@lang('Os Id')</th>
        <th>@lang('Ip')</th>
        <th>@lang('Domain Id')</th>
        <th>@lang('Location Id')</th>
        <th>@lang('User Id')</th>
        <th colspan="3">@lang('Action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($software as $software)
        <tr>
            <td>{!! $software->server_name !!}</td>
            <td>{!! $software->status ? 'فعال' : 'غیرفعال' !!}</td>
            <td>{!! $software->os->title !!}</td>
            <td>{!! $software->ip !!}</td>
            <td>{!! $software->domain->url !!}</td>
            <td>{!! $software->location->title !!}</td>
            <td>{!! $software->user->name !!}</td>
            <td>
                {!! Form::open(['route' => ['software.destroy', $software->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('software.show', [$software->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('software.edit', [$software->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>