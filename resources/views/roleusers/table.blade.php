<table class="table table-responsive" id="roleusers-table">
    <thead>
    <tr>
        <th>@lang('User Id')</th>
        <th>@lang('User Related Id')</th>
        <th>@lang('Role Id')</th>
        <th colspan="3">@lang('Action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($roleusers as $roleuser)
        <tr>
            <td>{!! $roleuser->user->name !!}</td>
            <td>{!! $roleuser->roleUser->name !!}</td>
            <td>{!! $roleuser->role->title !!}</td>
            <td>
                {!! Form::open(['route' => ['roleusers.destroy', $roleuser->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('roleusers.show', [$roleuser->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('roleusers.edit', [$roleuser->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>