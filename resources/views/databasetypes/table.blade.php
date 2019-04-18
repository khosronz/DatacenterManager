<table class="table table-responsive table-striped table-bordered" id="databasetypes-table"
       style="display: block;overflow-x: auto; white-space: nowrap;">
    <thead>
    <tr>
        <th>@lang('Title')</th>
        <th>@lang('Standard Port')</th>
        <th>@lang('Desc')</th>
        <th>@lang('User Id')</th>
        <th colspan="3">@lang('Action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($databasetypes as $databasetype)
        <tr>
            <td>{!! $databasetype->title !!}</td>
            <td>{!! $databasetype->standard_port !!}</td>
            <td>{!! $databasetype->desc !!}</td>
            <td>{!! $databasetype->user->name !!}</td>
            <td>
                {!! Form::open(['route' => ['databasetypes.destroy', $databasetype->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('databasetypes.show', [$databasetype->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('databasetypes.edit', [$databasetype->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>