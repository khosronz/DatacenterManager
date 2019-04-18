<table class="table table-responsive table-striped table-bordered" id="ipranges-table"
       style="display: block;overflow-x: auto; white-space: nowrap;">
    <thead>
    <tr>
        <th>@lang('Title')</th>
        <th>@lang('Status')</th>
        <th>@lang('From')</th>
        <th>@lang('To')</th>
        <th>@lang('User Id')</th>
        <th>@lang('Location Id')</th>
        <th>@lang('Desc')</th>
        <th colspan="3">@lang('Action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($ipranges as $iprange)
        <tr>
            <td>{!! $iprange->title !!}</td>
            <td>{!! $iprange->status ? 'فعال' : 'غیرفعال' !!}</td>
            <td>{!! $iprange->from !!}</td>
            <td>{!! $iprange->to !!}</td>
            <td>{!! $iprange->user->name !!}</td>
            <td>{!! $iprange->location->title !!}</td>
            <td>{!! $iprange->desc !!}</td>
            <td>
                {!! Form::open(['route' => ['ipranges.destroy', $iprange->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('ipranges.show', [$iprange->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('ipranges.edit', [$iprange->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>