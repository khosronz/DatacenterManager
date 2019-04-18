<!-- Id Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $iprange->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group col-sm-3">
    {!! Form::label('title', __('Title').':') !!}
    <p>{!! $iprange->title !!}</p>
</div>

<!-- Status Field -->
<div class="form-group col-sm-3">
    {!! Form::label('status', __('Status').':') !!}
    <p>{!! $iprange->status ? 'فعال' : 'غیرفعال' !!}</p>
</div>

<!-- From Field -->
<div class="form-group col-sm-3">
    {!! Form::label('from', __('From').':') !!}
    <p>{!! $iprange->from !!}</p>
</div>

<!-- To Field -->
<div class="form-group col-sm-3">
    {!! Form::label('to', __('To').':') !!}
    <p>{!! $iprange->to !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('user_id', __('User Id').':') !!}
    <p>{!! $iprange->user->name !!}</p>
</div>

<!-- Location Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('location_id', __('Location Id').':') !!}
    <p>{!! $iprange->location->title !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12">
    {!! Form::label('desc', __('Desc').':') !!}
    <p>{!! $iprange->desc !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($iprange->created_at) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($iprange->updated_at) !!}</p>
</div>

