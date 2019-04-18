@lang('')
<table class="table table-responsive table-bordered table-striped" id="phonebooks-table"
       style="display: block;overflow-x: auto; white-space: nowrap;">
    <thead>
    <tr>
        <th>@lang('Phone Number')</th>
        <th>@lang('Status')</th>
        <th>@lang('Desc')</th>
        <th>@lang('User Id')</th>
        <th>@lang('Phonetype Id')</th>
        <th colspan="3">@lang('Action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($phonebooks as $phonebook)
        <tr>
            <td>{!! $phonebook->phone_number !!}</td>
            <td>{!! $phonebook->status ? 'فعال' : 'غیرفعال' !!}</td>
            <td>{!! $phonebook->desc !!}</td>
            <td>{!! $phonebook->user->name !!}</td>
            <td>{!! $phonebook->phonetype->title !!}</td>
            <td>
                {!! Form::open(['route' => ['phonebooks.destroy', $phonebook->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('phonebooks.show', [$phonebook->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('phonebooks.edit', [$phonebook->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>