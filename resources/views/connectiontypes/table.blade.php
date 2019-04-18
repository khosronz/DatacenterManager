<table class="table table-responsive table-bordered table-striped" id="connectiontypes-table">
    <thead>
    <tr>
        <th>@lang('Title')</th>
        <th>@lang('Status')</th>
        <th>@lang('Standard Port')</th>
        <th>@lang('User Id')</th>
        <th>@lang('Desc')</th>
        <th colspan="3">@lang('Action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($connectiontypes as $connectiontype)
        <tr>
            <td>{!! $connectiontype->title !!}</td>
            <td>{!! $connectiontype->status ? 'فعال' : 'غیرفعال' !!}</td>
            <td>{!! $connectiontype->standard_port !!}</td>
            <td>{!! $connectiontype->user->name !!}</td>
            <td>{!! $connectiontype->desc !!}</td>
            <td>
                {!! Form::open(['route' => ['connectiontypes.destroy', $connectiontype->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('connectiontypes.show', [$connectiontype->id]) !!}"
                       class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('connectiontypes.edit', [$connectiontype->id]) !!}"
                       class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>