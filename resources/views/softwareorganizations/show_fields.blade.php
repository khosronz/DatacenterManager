<!-- Id Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $softwareorganization->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('user_id', __('User Id').':') !!}
    <p>{!! $softwareorganization->user->name !!}</p>
</div>

<!-- Organization Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('organization_id', __('Organization Id').':') !!}
    <p>{!! $softwareorganization->organization->title !!}</p>
</div>

<!-- Software Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('software_id', __('Software Id').':') !!}
    <p>{!! $softwareorganization->software->server_name !!}</p>
</div>

<!-- Status Field -->
<div class="form-group col-sm-3">
    {!! Form::label('status', __('Status').':') !!}
    <p>{!! $softwareorganization->status ? 'فعال' : 'غیرفعال' !!}</p>
</div>

<!-- Relation Type Field -->
<div class="form-group col-sm-3">
    {!! Form::label('relation_type', __('Relation Type').':') !!}
    <p>{!! $softwareorganization->relation_type == 'User' ? __('Organization User') : __('Organization Owner') !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12">
    {!! Form::label('desc', __('Desc').':') !!}
    <p>{!! $softwareorganization->desc !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($softwareorganization->created_at) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($softwareorganization->updated_at) !!}</p>
</div>

