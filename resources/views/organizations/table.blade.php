<table class="table table-responsive table-bordered table-striped" id="organizations-table"
       style="display: block;overflow-x: auto; white-space: nowrap;">
    <thead>
    <tr>
        <th>@lang('Title')</th>
        <th>@lang('Parent Id')</th>
        <th>@lang('User Id')</th>
        <th>@lang('Status')</th>
        <th>@lang('Desc')</th>
        <th colspan="3">@lang('Action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($organizations as $organization)
        <tr>
            <td>{!! $organization->title !!}</td>
            <td>{!! $organization->organization->title !!}</td>
            <td>{!! $organization->user->name !!}</td>
            <td>{!! $organization->status ? 'فعال' : 'غیرفعال' !!}</td>
            <td>{!! $organization->desc !!}</td>
            <td>
                {!! Form::open(['route' => ['organizations.destroy', $organization->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('organizations.show', [$organization->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('organizations.edit', [$organization->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>