<!-- Id Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $softwaredesc->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group col-sm-3">
    {!! Form::label('title', __('Title').':') !!}
    <p>{!! $softwaredesc->title !!}</p>
</div>

<!-- Status Field -->
<div class="form-group col-sm-3">
    {!! Form::label('status', __('Status').':') !!}
    <p>{!! $softwaredesc->status ? 'فعال' : 'غیرفعال' !!}</p>
</div>

<!-- Desc Date Field -->
<div class="form-group col-sm-3">
    {!! Form::label('desc_date', __('Desc Date').':') !!}
    <p>{!! $softwaredesc->desc_date !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('user_id', __('User Id').':') !!}
    <p>{!! $softwaredesc->user->name !!}</p>
</div>

<!-- Software Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('software_id', __('Software Id').':') !!}
    <p>{!! $softwaredesc->software->server_name !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12">
    {!! Form::label('desc', __('Desc').':') !!}
    <p>{!! $softwaredesc->desc !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($softwaredesc->created_at) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($softwaredesc->updated_at) !!}</p>
</div>

