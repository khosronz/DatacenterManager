<!-- Id Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $softwareuser->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group col-sm-3">
    {!! Form::label('title', __('Title').':') !!}
    <p>{!! $softwareuser->title !!}</p>
</div>

<!-- Status Field -->
<div class="form-group col-sm-3">
    {!! Form::label('status', __('Status').':') !!}
    <p>{!! $softwareuser->status ? 'فعال' : 'غیرفعال' !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('user_id', __('User Id').':') !!}
    <p>{!! $softwareuser->user->name !!}</p>
</div>

<!-- User Related Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('user_related_id', __('User Related Id').':') !!}
    <p>{!! $softwareuser->softwareUsers->name !!}</p>
</div>

<!-- Software Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('software_id', __('Software Id').':') !!}
    <p>{!! $softwareuser->software->server_name !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12">
    {!! Form::label('desc', __('Desc').':') !!}
    <p>{!! $softwareuser->desc !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($softwareuser->created_at) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($softwareuser->updated_at) !!}</p>
</div>

