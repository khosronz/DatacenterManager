<!-- Id Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $connection->id !!}</p>
</div>

<!-- Username Field -->
<div class="form-group col-sm-3">
    {!! Form::label('username', __('Username').':') !!}
    <p>{!! $connection->username !!}</p>
</div>

<!-- Password Field -->
<div class="form-group col-sm-3">
    {!! Form::label('password', __('Password').':') !!}
    <p>{!! decrypt($connection->password) !!}</p>
</div>

<!-- Port Field -->
<div class="form-group col-sm-3">
    {!! Form::label('port', __('Port').':') !!}
    <p>{!! $connection->port !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('user_id', __('User Id').':') !!}
    <p>{!! $connection->user->name !!}</p>
</div>

<!-- Connectiontype Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('connectiontype_id', __('Connectiontype Id').':') !!}
    <p>{!! $connection->connectiontype->title !!}</p>
</div>

<!-- Software Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('software_id', __('Software Id').':') !!}
    <p>{!! $connection->software->server_name !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12">
    {!! Form::label('desc', __('Desc').':') !!}
    <p>{!! $connection->desc !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! jdate($connection->created_at) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-3">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! jdate($connection->updated_at) !!}</p>
</div>

