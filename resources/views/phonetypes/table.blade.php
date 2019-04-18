<table class="table table-responsive table-bordered table-striped" id="phonetypes-table"
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
    @foreach($phonetypes as $phonetype)
        <tr>
            <td>{!! $phonetype->title !!}</td>
            <td>{!! $phonetype->status ? 'فعال' : 'غیرفعال' !!}</td>
            <td>{!! $phonetype->desc !!}</td>
            <td>{!! $phonetype->user->name !!}</td>
            <td>
                {!! Form::open(['route' => ['phonetypes.destroy', $phonetype->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('phonetypes.show', [$phonetype->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('phonetypes.edit', [$phonetype->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>