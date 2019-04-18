<table class="table table-responsive table-striped table-bordered" id="webaddresses-table"
       style="display: block;overflow-x: auto; white-space: nowrap;">
    <thead>
    <tr>
        <th>@lang('Title')</th>
        <th>@lang('Url')</th>
        <th>@lang('Status')</th>
        <th>@lang('User Id')</th>
        <th>@lang('Software Id')</th>
        <th>@lang('Desc')</th>
        <th colspan="3">@lang('Action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($webaddresses as $webaddress)
        <tr>
            <td>{!! $webaddress->title !!}</td>
            <td>{!! $webaddress->url !!}</td>
            <td>{!! $webaddress->status ? 'فعال' : 'غیرفعال' !!}</td>
            <td>{!! $webaddress->user->name !!}</td>
            <td>{!! $webaddress->software->server_name !!}</td>
            <td>{!! $webaddress->desc !!}</td>
            <td>
                {!! Form::open(['route' => ['webaddresses.destroy', $webaddress->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('webaddresses.show', [$webaddress->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('webaddresses.edit', [$webaddress->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>