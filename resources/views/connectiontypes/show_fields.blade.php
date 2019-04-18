<!-- Id Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $connectiontype->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group col-sm-3">
    {!! Form::label('title', __('Title').':') !!}
    <p>{!! $connectiontype->title !!}</p>
</div>

<!-- Status Field -->
<div class="form-group col-sm-3">
    {!! Form::label('status', __('Status').':') !!}
    <p>{!! $connectiontype->status ? 'فعال' : 'غیرفعال' !!}</p>
</div>

<!-- Standard Port Field -->
<div class="form-group col-sm-3">
    {!! Form::label('standard_port', __('Standard Port').':') !!}
    <p>{!! $connectiontype->standard_port !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('user_id', __('User Id').':') !!}
    <p>{!! $connectiontype->user->name !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12">
    {!! Form::label('desc', __('Desc').':') !!}
    <p>{!! $connectiontype->desc !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($connectiontype->created_at)!!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($connectiontype->updated_at) !!}</p>
</div>

