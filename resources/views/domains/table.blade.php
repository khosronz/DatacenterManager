<table class="table table-responsive table-bordered table-striped" id="domains-table" style="display: block;overflow-x: auto; white-space: nowrap;">
    <thead>
    <tr>
        <th>@lang('Url')</th>
        <th>@lang('Username')</th>
        <th>@lang('User Id')</th>
        <th>@lang('Os Id')</th>
        <th>@lang('Desc')</th>
        <th colspan="3">@lang('Action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($domains as $domain)
        <tr>
            <td>{!! $domain->url !!}</td>
            <td>{!! $domain->username !!}</td>
            <td>{!! $domain->user->name !!}</td>
            <td>{!! $domain->os->title !!}</td>
            <td>{!! $domain->desc !!}</td>
            <td>
                {!! Form::open(['route' => ['domains.destroy', $domain->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('domains.show', [$domain->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('domains.edit', [$domain->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>