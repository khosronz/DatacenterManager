<table class="table table-responsive table-bordered table-striped" id="softwaredescs-table"
       style="display: block;overflow-x: auto; white-space: nowrap;">
    <thead>
    <tr>
        <th>@lang('Title')</th>
        <th>@lang('Status')</th>
        <th>@lang('Desc Date')</th>
        <th>@lang('User Id')</th>
        <th>@lang('Software Id')</th>
        <th>@lang('Desc')</th>
        <th colspan="3">@lang('Action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($softwaredescs as $softwaredesc)
        <tr>
            <td>{!! $softwaredesc->title !!}</td>
            <td>{!! $softwaredesc->status ? 'فعال' : 'غیرفعال' !!}</td>
            <td>{!! $softwaredesc->desc_date !!}</td>
            <td>{!! $softwaredesc->user->name !!}</td>
            <td>{!! $softwaredesc->software->server_name !!}</td>
            <td>{!! $softwaredesc->desc !!}</td>
            <td>
                {!! Form::open(['route' => ['softwaredescs.destroy', $softwaredesc->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('softwaredescs.show', [$softwaredesc->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('softwaredescs.edit', [$softwaredesc->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>