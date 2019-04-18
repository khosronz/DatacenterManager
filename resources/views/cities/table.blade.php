<table class="table table-responsive table-striped table-bordered" id="cities-table"
       style="display: block;overflow-x: auto; white-space: nowrap;">
    <thead>
    <tr>
        <th>@lang('Title')</th>
        <th>@lang('Status')</th>
        <th>@lang('Desc')</th>
        <th>@lang('User Id')</th>
        <th>@lang('Province Id')</th>
        <th colspan="3">@lang('Action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cities as $city)
        <tr>
            <td>{!! $city->title !!}</td>
            <td>{!! $city->status ? 'فعال' : 'غیرفعال' !!}</td>
            <td>{!! $city->desc !!}</td>
            <td>{!! $city->user->name !!}</td>
            <td>{!! $city->province->title !!}</td>
            <td>
                {!! Form::open(['route' => ['cities.destroy', $city->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('cities.show', [$city->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('cities.edit', [$city->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>