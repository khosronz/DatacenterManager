<table class="table table-responsive table-striped table-bordered" id="softwareusers-table"
       style="display: block;overflow-x: auto; white-space: nowrap;">
    <thead>
    <tr>
        <th>@lang('Title')</th>
        <th>@lang('Status')</th>
        <th>@lang('User Id')</th>
        <th>@lang('User Related Id')</th>
        <th>@lang('Software Id')</th>
        <th>@lang('Desc')</th>
        <th colspan="3">@lang('Action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($softwareusers as $softwareuser)
        <tr>
            <td>{!! $softwareuser->title !!}</td>
            <td>{!! $softwareuser->status ? 'فعال' : 'غیرفعال' !!}</td>
            <td>{!! $softwareuser->user->name !!}</td>
            <td>{!! $softwareuser->userRelated->name !!}</td>
            <td>{!! $softwareuser->software->server_name !!}</td>
            <td>{!! $softwareuser->desc !!}</td>
            <td>
                {!! Form::open(['route' => ['softwareusers.destroy', $softwareuser->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('softwareusers.show', [$softwareuser->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('softwareusers.edit', [$softwareuser->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>