<!-- Id Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $roleuser->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('user_id', __('User Id').':') !!}
    <p>{!! $roleuser->user->name !!}</p>
</div>

<!-- User Related Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('user_related_id', __('User Related Id').':') !!}
    <p>{!! $roleuser->roleUser->name !!}</p>
</div>

<!-- Role Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('role_id', __('Role Id').':') !!}
    <p>{!! $roleuser->role->title !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! $roleuser->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! $roleuser->updated_at !!}</p>
</div>

