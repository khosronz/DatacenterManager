<table class="table table-responsive table-bordered table-striped" id="softwareorganizations-table"
       style="display: block;overflow-x: auto; white-space: nowrap;">
    <thead>
    <tr>
        <th>@lang('User Id')</th>
        <th>@lang('Organization Id')</th>
        <th>@lang('Software Id')</th>
        <th>@lang('Status')</th>
        <th>@lang('Relation Type')</th>
        <th>@lang('Desc')</th>
        <th colspan="3">@lang('Action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($softwareorganizations as $softwareorganization)
        <tr>
            <td>{!! $softwareorganization->user->name !!}</td>
            <td>{!! $softwareorganization->organization->title !!}</td>
            <td>{!! $softwareorganization->software->server_name !!}</td>
            <td>{!! $softwareorganization->status ? 'فعال' : 'غیرفعال' !!}</td>
            <td>{!! $softwareorganization->relation_type == 'User' ? __('Organization User') : __('Organization Owner') !!}</td>
            <td>{!! $softwareorganization->desc !!}</td>
            <td>
                {!! Form::open(['route' => ['softwareorganizations.destroy', $softwareorganization->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('softwareorganizations.show', [$softwareorganization->id]) !!}"
                       class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('softwareorganizations.edit', [$softwareorganization->id]) !!}"
                       class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>