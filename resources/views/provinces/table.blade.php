<table class="table table-responsive table-bordered table-striped" id="provinces-table"
       style="display: block;overflow-x: auto; white-space: nowrap;">
    <thead>
    <tr>
        <th>@lang('Title')</th>
        <th>@lang('Status')</th>
        <th>@lang('Desc')</th>
        <th>@lang('User Id')</th>
        <th colspan="3">@lang('Action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($provinces as $province)
        <tr>
            <td>{!! $province->title !!}</td>
            <td>{!! $province->status ? 'فعال' : 'غیرفعال' !!}</td>
            <td>{!! $province->desc !!}</td>
            <td>{!! $province->user->name !!}</td>
            <td>
                {!! Form::open(['route' => ['provinces.destroy', $province->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('provinces.show', [$province->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('provinces.edit', [$province->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>