<!-- Id Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $software->id !!}</p>
</div>

<!-- Server Name Field -->
<div class="form-group col-sm-3">
    {!! Form::label('server_name', __('Server Name').':') !!}
    <p>{!! $software->server_name !!}</p>
</div>

<!-- Status Field -->
<div class="form-group col-sm-3">
    {!! Form::label('status', __('Status').':') !!}
    <p>{!! $software->status ? 'فعال' : 'غیرفعال' !!}</p>
</div>

<!-- Os Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('os_id', __('Os Id').':') !!}
    <p>{!! $software->os->title !!}</p>
</div>

<!-- Ip Field -->
<div class="form-group col-sm-3">
    {!! Form::label('ip', __('Ip').':') !!}
    <p>{!! $software->ip !!}</p>
</div>

<!-- Domain Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('domain_id', __('Domain Id').':') !!}
    <p>{!! $software->domain->url !!}</p>
</div>

<!-- Location Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('location_id', __('Location Id').':') !!}
    <p>{!! $software->location->title !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('user_id', __('User Id').':') !!}
    <p>{!! $software->user->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($software->created_at) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($software->updated_at) !!}</p>
</div>

