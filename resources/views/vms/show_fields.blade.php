<!-- Id Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $vm->id !!}</p>
</div>

<!-- Username Field -->
<div class="form-group col-sm-3">
    {!! Form::label('username', __('Username').':') !!}
    <p>{!! $vm->username !!}</p>
</div>

<!-- Password Field -->
<div class="form-group col-sm-3">
    {!! Form::label('password', __('Password').':') !!}
    <p>{!! decrypt($vm->password) !!}</p>
</div>

<!-- Ip Field -->
<div class="form-group col-sm-3">
    {!! Form::label('ip', __('Ip').':') !!}
    <p>{!! $vm->ip !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('user_id', __('User Id').':') !!}
    <p>{!! $vm->user->name !!}</p>
</div>

<!-- Vmtype Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('vmtype_id', __('Vmtype Id').':') !!}
    <p>{!! $vm->vmtype->title !!}</p>
</div>

<!-- Software Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('software_id', __('Software Id').':') !!}
    <p>{!! $vm->software->server_name !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12">
    {!! Form::label('desc', __('Desc').':') !!}
    <p>{!! $vm->desc !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($vm->created_at) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($vm->updated_at) !!}</p>
</div>

