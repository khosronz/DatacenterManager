<!-- Id Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $os->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group col-sm-3">
    {!! Form::label('title', __('Title').':') !!}
    <p>{!! $os->title !!}</p>
</div>

<!-- Status Field -->
<div class="form-group col-sm-3">
    {!! Form::label('status', __('Status').':') !!}
    <p>{!! $os->status ? 'فعال' : 'غیرفعال' !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12">
    {!! Form::label('desc', __('Desc').':') !!}
    <p>{!! $os->desc !!}</p>
</div>

<!-- Ostype Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('ostype_id', __('Ostype Id').':') !!}
    <p>{!! $os->ostype->title !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('user_id', __('User Id').':') !!}
    <p>{!! $os->user->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($os->created_at) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($os->updated_at) !!}</p>
</div>

