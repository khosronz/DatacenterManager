<!-- Id Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $domain->id !!}</p>
</div>

<!-- Url Field -->
<div class="form-group col-sm-3">
    {!! Form::label('url', __('Url').':') !!}
    <p>{!! $domain->url !!}</p>
</div>

<!-- Username Field -->
<div class="form-group col-sm-3">
    {!! Form::label('username', __('Username').':') !!}
    <p>{!! $domain->username !!}</p>
</div>

<!-- Password Field -->
<div class="form-group col-sm-3">
    {!! Form::label('password', __('Password').':') !!}
    <p>{!! decrypt($domain->password)!!}</p>
</div>

<!-- User Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('user_id', __('User Id').':') !!}
    <p>{!! $domain->user->name !!}</p>
</div>

<!-- Os Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('os_id', __('Os Id').':') !!}
    <p>{!! $domain->os->title !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12">
    {!! Form::label('desc', __('Desc').':') !!}
    <p>{!! $domain->desc !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($domain->created_at) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($domain->updated_at) !!}</p>
</div>

