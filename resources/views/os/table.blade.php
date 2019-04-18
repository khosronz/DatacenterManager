<table class="table table-responsive table-bordered table-striped" id="os-table">
    <thead>
    <tr>
        <th>@lang('Version')</th>
        <th>@lang('Status')</th>
        <th>@lang('Desc')</th>
        <th>@lang('Ostype Id')</th>
        <th>@lang('User Id')</th>
        <th colspan="3">@lang('Action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($os as $os)
        <tr>
            <td>{!! $os->title !!}</td>
            <td>{!! $os->status ? 'فعال' : 'غیرفعال' !!}</td>
            <td>{!! $os->desc !!}</td>
            <td>{!! $os->ostype->title !!}</td>
            <td>{!! $os->user->name !!}</td>
            <td>
                {!! Form::open(['route' => ['os.destroy', $os->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('os.show', [$os->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('os.edit', [$os->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>