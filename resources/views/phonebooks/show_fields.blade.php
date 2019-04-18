<!-- Id Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $phonebook->id !!}</p>
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-3">
    {!! Form::label('phone_number', __('Phone Number').':') !!}
    <p>{!! $phonebook->phone_number !!}</p>
</div>

<!-- Status Field -->
<div class="form-group col-sm-3">
    {!! Form::label('status', __('Status').':') !!}
    <p>{!! $phonebook->status ? 'فعال' : 'غیرفعال' !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('user_id', __('User Id').':') !!}
    <p>{!! $phonebook->user->name !!}</p>
</div>

<!-- Phonetype Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('phonetype_id', __('Phonetype Id').':') !!}
    <p>{!! $phonebook->phonetype->title !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12">
    {!! Form::label('desc', __('Desc').':') !!}
    <p>{!! $phonebook->desc !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($phonebook->created_at) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($phonebook->updated_at) !!}</p>
</div>

