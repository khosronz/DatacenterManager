<!-- Id Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $location->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group col-sm-3">
    {!! Form::label('title', __('Title').':') !!}
    <p>{!! $location->title !!}</p>
</div>

<!-- Status Field -->
<div class="form-group col-sm-3">
    {!! Form::label('status', __('Status').':') !!}
    <p>{!! $location->status ? 'فعال' : 'غیرفعال' !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12">
    {!! Form::label('desc', __('Desc').':') !!}
    <p>{!! $location->desc !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('user_id', __('User Id').':') !!}
    <p>{!! $location->user->name !!}</p>
</div>

<!-- City Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('city_id', __('City Id').':') !!}
    <p>{!! $location->city->title !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($location->created_at) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($location->updated_at) !!}</p>
</div>

