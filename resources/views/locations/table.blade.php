<table class="table table-responsive table-bordered table-striped" id="locations-table"
       style="display: block;overflow-x: auto; white-space: nowrap;">
    <thead>
    <tr>
        <th>@lang('Title')</th>
        <th>@lang('Status')</th>
        <th>@lang('Desc')</th>
        <th>@lang('User Id')</th>
        <th>@lang('City Id')</th>
        <th colspan="3">@lang('Action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($locations as $location)
        <tr>
            <td>{!! $location->title !!}</td>
            <td>{!! $location->status ? 'فعال' : 'غیرفعال' !!}</td>
            <td>{!! $location->desc !!}</td>
            <td>{!! $location->user->name !!}</td>
            <td>{!! $location->city->title !!}</td>
            <td>
                {!! Form::open(['route' => ['locations.destroy', $location->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('locations.show', [$location->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('locations.edit', [$location->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>